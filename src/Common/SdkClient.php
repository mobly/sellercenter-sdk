<?php

namespace SellerCenter\SDK\Common;

use SellerCenter\SDK\Common\Exception\SdkException;
use SellerCenter\SDK\Common\Waiter\ResourceWaiter;
use SellerCenter\SDK\Common\Waiter\Waiter;
use SellerCenter\SDK\Sdk;
use SellerCenter\SDK\Common\Api\Service;
use SellerCenter\SDK\Common\Credentials\CredentialsInterface;
use SellerCenter\SDK\Common\Signature\SignatureInterface;
use GuzzleHttp\Command\AbstractClient;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Exception\RequestException;
use UnexpectedValueException;

/**
 * Class SdkClient
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class SdkClient extends AbstractClient implements SdkClientInterface
{
    /** @var CredentialsInterface Api credentials */
    private $credentials;

    /** @var SignatureInterface Signature implementation of the service */
    private $signature;

    /** @var array Default command options */
    private $defaults;

    /** @var string */
    private $store;

    /** @var string */
    private $endpoint;

    /** @var Service */
    private $api;

    /** @var string */
    private $commandException;

    /** @var callable */
    private $errorParser;

    /** @var callable */
    private $serializer;

    /**
     * The SdkClient constructor requires the following constructor options:
     *
     * - api: The Api object used to interact with a web service
     * - credentials: CredentialsInterface object used when signing.
     * - client: {@see GuzzleHttp\Client} used to send requests.
     * - signature: string representing the signature version to use (e.g., v4)
     * - error_parser: A callable that parses response exceptions
     * - serializer: callable used to serialize a request for a provided
     *       CommandTransaction argument. The callable must return a
     *       RequestInterface object.
     *
     * @param array $config Configuration options
     *
     * @throws \InvalidArgumentException if any required options are missing
     */
    public function __construct(array $config)
    {
        static $required = [
            'api',
            'credentials',
            'client',
            'signature',
            'error_parser',
            'endpoint',
            'serializer',
        ];

        foreach ($required as $r) {
            if (!isset($config[$r])) {
                throw new \InvalidArgumentException("$r is a required option");
            }
        }

        $this->serializer = $config['serializer'];
        $this->api = $config['api'];
        $this->endpoint = $config['endpoint'];
        $this->credentials = $config['credentials'];
        $this->signature = $config['signature'];
        $this->errorParser = $config['error_parser'];
        $this->store = isset($config['store']) ? $config['store'] : null;
        $this->defaults = isset($config['defaults']) ? $config['defaults'] : [];
            $this->commandException = isset($config['exception_class'])
                ? $config['exception_class']
                : 'SellerCenter\SDK\Common\Exception\SdkException';

        parent::__construct($config['client']);
    }

    /**
     * Creates a new client based on the provided configuration options.
     *
     * @param array $config Configuration options
     *
     * @return static
     */
    public static function factory(array $config = [])
    {
        // Determine the service being called
        $class = get_called_class();
        $service = substr($class, strrpos($class, '\\') + 1, -6);

        // Create the client using the Sdk class
        return (new Sdk)->getClient($service, $config);
    }

    public function getCredentials()
    {
        return $this->credentials;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getStore()
    {
        return $this->store;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getApi()
    {
        return $this->api;
    }

    /**
     * Executes an API command.
     *
     * @param CommandInterface $command Command to execute
     *
     * @return mixed Returns the result of the command
     * @throws SdkException when an error occurs during transfer
     */
    public function execute(CommandInterface $command)
    {
        try {
            return parent::execute($command);
        } catch (SdkException $e) {
            throw $e;
        } catch (\Exception $e) {
            // Wrap other uncaught exceptions for consistency
            /* @var SdkException $exceptionClass */
            $exceptionClass = $this->commandException;
            throw new $exceptionClass(
                sprintf(
                    'Uncaught exception while executing %s::%s - %s',
                    get_class($this),
                    $command->getName(),
                    $e->getMessage()
                ),
                new CommandTransaction($this, $command),
                $e
            );
        }
    }

    public function getCommand($name, array $args = [])
    {
        // Fail fast if the command cannot be found in the description.
        if (!isset($this->api['operations'][$name])) {
            $name = ucfirst($name);
            if (!isset($this->api['operations'][$name])) {
                throw new \InvalidArgumentException("Operation not found: $name");
            }
        }

        // Merge in default configuration options.
        $args += $this->getConfig('defaults');

        if (isset($args['@future'])) {
            $future = $args['@future'];
            unset($args['@future']);
        } else {
            $future = false;
        }

        return new Command($name, $args + $this->defaults, [
            'emitter' => clone $this->getEmitter(),
            'future' => $future
        ]);
    }

    public function getIterator($name, array $args = [], array $config = [])
    {
        $config += $this->api->getPaginatorConfig($name);
        if (!$config['result_key']) {
            throw new \UnexpectedValueException(sprintf(
                'There are no resources to iterate for the %s operation of %s',
                $name,
                $this->api['serviceFullName']
            ));
        }

        $key = is_array($config['result_key'])
            ? $config['result_key'][0]
            : $config['result_key'];

        if ($config['output_token'] && $config['input_token']) {
            return $this->getPaginator($name, $args)->search($key);
        }

        $result = $this->getCommand($name, $args)->search($key);

        return new \ArrayIterator((array) $result);
    }

    public function getPaginator($name, array $args = [], array $config = [])
    {
        $config += $this->api->getPaginatorConfig($name);
        if ($config['output_token'] && $config['input_token']) {
            return new ResultPaginator($this, $name, $args, $config);
        }

        throw new UnexpectedValueException(
            "Results for the {$name} operation of {$this->api['serviceFullName']} cannot be paginated."
        );
    }

    public function getWaiter($name, array $args = [], array $config = [])
    {
        $config += $this->api->getWaiterConfig($name);

        return new ResourceWaiter($this, $name, $args, $config);
    }

    public function waitUntil($name, array $args = [], array $config = [])
    {
        $waiter = is_callable($name)
            ? new Waiter($name, $config + $args)
            : $this->getWaiter($name, $args, $config);

        $waiter->wait();
    }

    /**
     * Creates API specific exceptions.
     *
     * {@inheritdoc}
     *
     * @return SdkException
     */
    public function createCommandException(CommandTransaction $transaction)
    {
        // Throw API exceptions as-is
        if ($transaction->exception instanceof SdkException) {
            return $transaction->exception;
        }

        // Set default values (e.g., for non-RequestException)
        $url = null;
        $transaction->context['api_error'] = [];
        $serviceError = $transaction->exception->getMessage();

        if ($transaction->exception instanceof RequestException) {
            $url = $transaction->exception->getRequest()->getUrl();
            if ($response = $transaction->exception->getResponse()) {
                $parser = $this->errorParser;
                // Add the parsed response error to the exception.
                $transaction->context['api_error'] = $parser($response);
                // Only use the API error code if the parser could parse response.
                if (!$transaction->context->getPath('api_error/type')) {
                    $serviceError = $transaction->exception->getMessage();
                } else {
                    // Create an easy to read error message.
                    $serviceError = trim(
                        $transaction->context->getPath('api_error/code')
                        . ' (' . $transaction->context->getPath('api_error/type')
                        . ' error): ' . $transaction->context->getPath('api_error/message')
                    );
                }
            }
        }

        $exceptionClass = $this->commandException;
        return new $exceptionClass(
            sprintf(
                'Error executing %s::%s() on "%s"; %s',
                get_class($this),
                lcfirst($transaction->command->getName()),
                $url,
                $serviceError
            ),
            $transaction,
            $transaction->exception
        );
    }

    protected function createFutureResult(CommandTransaction $transaction)
    {
        return new FutureResult(
            $transaction->response->then(function () use ($transaction) {
                return $transaction->result;
            }),
            [$transaction->response, 'wait'],
            [$transaction->response, 'cancel']
        );
    }

    protected function serializeRequest(CommandTransaction $commandTransaction)
    {
        $callable = $this->serializer;
        return $callable($commandTransaction);
    }
}
