<?php namespace SellerCenter\SDK\Common;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Command\Subscriber\Debug;
use InvalidArgumentException;
use SellerCenter\SDK\Sdk;
use SellerCenter\SDK\Common\Api\Service;
use SellerCenter\SDK\Common\Api\FilesystemApiProvider;
use SellerCenter\SDK\Common\Credentials\Credentials;
use SellerCenter\SDK\Common\Credentials\CredentialsInterface;
use SellerCenter\SDK\Common\Signature\SignatureV1;
use SellerCenter\SDK\Common\Signature\SignatureInterface;
use SellerCenter\SDK\Common\Subscriber\Signature;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Utils;

/**
 * Class ClientFactory
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class ClientFactory
{
    /**
     * Represents how provided key value pairs are processed.
     *
     * - true: The value is passed through to the underlying client unchanged.
     * - 1: There is a handle_<key> function that handles this specific key
     *   before the client is constructed. The handler receives the value of
     *   the key and the provided arguments by reference.
     * - 2: There is a handle_<key> function that handles this specific key
     *   after the client is constructed. The handler function receives the
     *   value of the key, the provided arguments by reference, and the client.
     *
     * @var array
     */
    protected $validArguments = [
        'store'             => true,
        'environment'       => true,
        'service'           => true,
        'endpoint'          => true,
        'version'           => true,
        'defaults'          => true,
        'endpoint_provider' => 1,
        'api_provider'      => 1,
        'class_name'        => 1,
        'credentials'       => 1,
        'signature'         => 1,
        'client'            => 1,
        'debug'             => 2,
    ];

    /**
     * Constructs a new factory object used for building services.
     *
     * @param array $args
     *
     * @return \SellerCenter\SDK\Common\SdkClientInterface
     * @throws InvalidArgumentException
     * @see SellerCenter\SDK\Sdk::getClient() for a list of available options.
     */
    public function create(array $args = [])
    {
        static $required = [
            'store',
            'environment',
            'api_provider',
            'endpoint_provider',
        ];

        static $defaultArgs = [
            'credentials'       => [],
            'scheme'            => 'https',
            'store'             => null,
            'environment'       => null,
            'signature'         => false,
            'class_name'        => false,
            'version'           => 'v1'
        ];

        // Merge in and handle default arguments
        $args += $defaultArgs;
        $this->addDefaultArgs($args);

        // Ensure required arguments are provided.
        foreach ($required as $r) {
            if (!isset($args[$r])) {
                throw new InvalidArgumentException("{$r} is a required configuration setting when creating a client.");
            }
        }

        // Process each argument and keep track of deferred ones
        $deferred = [];
        foreach ($this->validArguments as $key => $type) {
            if (isset($args[$key])) {
                if ($type === 1) {
                    $normalizedMethod = ucfirst($this->underlineToCamelCase($key));
                    $this->{"handle{$normalizedMethod}"}($args[$key], $args);
                } elseif ($type === 2) {
                    $deferred[$key] = $args[$key];
                }
            }
        }

        // Create the client and then handle deferred and post-create logic
        $client = $this->createClient($args);
        foreach ($deferred as $key => $value) {
            $this->{"handle_{$key}"}($value, $args, $client);
        }

        $this->postCreate($client);

        return $client;
    }

    /**
     * Creates a client for the given arguments.
     *
     * This method can be overridden in subclasses as needed.
     *
     * @param array $args Arguments to provide to the client.
     *
     * @return SdkClientInterface
     */
    protected function createClient(array $args)
    {
        return new $args['client_class']($args);
    }

    /**
     * Apply default option arguments.
     *
     * @param array $args Arguments passed by reference
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['client'])) {
            $args['client'] = new Client();
        }

        if (!isset($args['api_provider'])) {
            $args['api_provider'] = new FilesystemApiProvider(
                __DIR__ . '/Resources/api'
            );
        }

        if (!isset($args['endpoint_provider'])) {
            $args['endpoint_provider'] = RulesEndpointProvider::fromDefaults();
        }
    }

    protected function handleDebug(
        $value,
        array &$args,
        SdkClientInterface $client
    ) {
        if ($value === false) {
            return;
        }

        $client->getEmitter()->attach(new Debug($value === true ? [] : $value));
    }

    private function handleClassName($value, array &$args)
    {
        if ($value !== false) {
            // An explicitly provided class_name must be found.
            $args['client_class'] = "SellerCenter\\SDK\\{$value}\\{$value}Client";
            if (!class_exists($args['client_class'])) {
                throw new \RuntimeException("Client not found for $value");
            }
            return;
        }

        $fullName = $args['api']->getMetadata('serviceFullName');
        $value = $this->convertServiceName($fullName);

        // If the dynamically created exception cannot be found, then use the
        // default client class.
        $args['client_class'] = "SellerCenter\\SDK\\{$value}\\{$value}Client";
        if (!class_exists($args['client_class'])) {
            $args['client_class'] = 'SellerCenter\SDK\Common\SdkClient';
        }

        $args['class_name'] = $value;
    }

    private function convertServiceName($serviceFullName)
    {
        static $search = ['SellerCenter ', 'SC  ', 'SDK ', ' (Beta)', ' '];
        static $map = ['A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd',
            'E' => 'e', 'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i',
            'J' => 'j', 'K' => 'k', 'L' => 'l', 'M' => 'm', 'N' => 'n',
            'O' => 'o', 'P' => 'p', 'Q' => 'q', 'R' => 'r', 'S' => 's',
            'T' => 't', 'U' => 'u', 'V' => 'v', 'W' => 'w', 'X' => 'x',
            'Y' => 'y', 'Z' => 'z'];

        // Convert to a strict PascalCase
        $value = str_replace($search, '', $serviceFullName);

        $i = -1;
        while (isset($value[++$i])) {
            if (isset($map[$value[$i]])) {
                while (isset($value[++$i]) && isset($map[$value[$i]])) {
                    $value[$i] = $map[$value[$i]];
                }
            }
        }

        return $value;
    }

    private function handleCredentials($value, array &$args)
    {
        // set basic or digest authentication, if needed
        if (isset($args['defaults']['auth']) && count($args['defaults']['auth']) >= 2) {
            $args['client']->setDefaultOption('auth', $args['defaults']['auth']);
        }

        if ($value instanceof CredentialsInterface) {
            return;
        } elseif (is_array($value)) {
            $args['credentials'] = Credentials::factory($value);
        } else {
            throw new InvalidArgumentException(
                'Credentials must be an '
                . 'instance of SellerCenter\SDK\Common\Credentials\CredentialsInterface '
                . 'or an associative array that contains API "key" and "secret".'
            );
        }
    }

    private function handleClient($value, array &$args)
    {
        if (!($value instanceof ClientInterface)) {
            throw new InvalidArgumentException(
                'client must be an instance of GuzzleHttp\ClientInterface, ' . get_class($value) . ' passed'
            );
        }

        // Make sure the user agent is prefixed by the SDK version
        $args['client']->setDefaultOption(
            'headers/User-Agent',
            'sellercenter-sdk-php/' . Sdk::VERSION . ' ' . Utils::getDefaultUserAgent()
        );
    }

    private function handleApiProvider($value, array &$args)
    {
        if (!is_callable($value)) {
            throw new InvalidArgumentException('api_provider must be callable');
        }

        $api = new Service($value, $args['service'], $args['version']);
        $args['api'] = $api;
        $args['error_parser'] = Service::createErrorParser($api->getProtocol());
        $args['serializer'] = Service::createSerializer($api, $args['endpoint']);
    }

    private function handleEndpointProvider($value, array &$args)
    {
        if (!is_callable($value)) {
            throw new InvalidArgumentException(
                'endpoint_provider must be a callable that returns an endpoint array.'
            );
        }

        if (!isset($args['endpoint'])) {
            $result = call_user_func($value, [
                'store'  => $args['store'],
                'environment' => $args['environment'],
            ]);

            $args['endpoint'] = $result['endpoint'];

            if (isset($result['signatureVersion'])) {
                $args['signature'] = $result['signatureVersion'];
            }
        }
    }

    private function handleSignature($value, array &$args)
    {
        $version = $value ?: $args['api']->getMetadata('signatureVersion');

        if (is_string($version)) {
            $args['signature'] = $this->createSignature($version);
        } elseif (!($version instanceof SignatureInterface)) {
            throw new InvalidArgumentException('Invalid signature option.');
        }
    }

    /**
     * Creates a signature object based on the service description
     * @param $version string version
     *
     * @return SignatureInterface
     * @throws InvalidArgumentException if the signature cannot be created
     */
    protected function createSignature($version)
    {
        switch ($version) {
            case 'v1':
                return new SignatureV1();
        }

        throw new InvalidArgumentException('Unable to create the signature.');
    }

    protected function postCreate(SdkClientInterface $client)
    {
        // Apply the protocol of the service description to the client.
        $this->applyParser($client);

        // Attach a signer to the client.
        $credentials = $client->getCredentials();

        // Use credentials to sign requests
        if ($credentials instanceof Credentials) {
            $client->getHttpClient()->getEmitter()->attach(
                new Signature($credentials, $client->getSignature())
            );
        }
    }

    /**
     * Creates and attaches parsers given client based on the protocol of the
     * description.
     *
     * @param SdkClientInterface $client SDK client to update
     *
     * @throws \UnexpectedValueException if the protocol doesn't exist
     */
    protected function applyParser(SdkClientInterface $client)
    {
        $api = $client->getApi();
        $parser = Service::createParser($api);
        $errorParser = Service::createErrorParser($api->getProtocol());

        $client->getEmitter()->on(
            'process',
            function (ProcessEvent $e) use ($errorParser) {
                // Ensure a response exists in order to parse.
                $response = $e->getResponse();
                if (!$response) {
                    throw new \RuntimeException('No response was received.');
                }

                /* @var \SellerCenter\SDK\Common\Api\ErrorParser\XmlErrorParser $errorParser */
                $result = $errorParser($response, $e);

                // @todo: maybe we should throw exception on error response
                if ($result instanceof Api\Response\Error\ErrorResponse) {
                    $e->setResult($result);
                    $e->stopPropagation();
                }
            }
        );

        $client->getEmitter()->on(
            'process',
            function (ProcessEvent $e) use ($parser, $api) {
                // Guard against exceptions and injected results.
                if ($e->getException() || $e->getResult()) {
                    return;
                }

                // Ensure a response exists in order to parse.
                $response = $e->getResponse();
                if (!$response) {
                    throw new \RuntimeException('No response was received.');
                }

                $operation = $api->getOperation($e->getCommand()->getName());
                $result = $parser($response, $operation['deserialize']);

                $e->setResult($result);
            }
        );
    }

    /**
     * Transform under_lined string to CamelCase
     *
     * @param string $string
     *
     * @return string
     */
    private function underlineToCamelCase($string)
    {
        $words = explode('_', strtolower($string));

        $return = '';
        foreach ($words as $word) {
            $return .= ucfirst(trim($word));
        }

        return $return;
    }
}
