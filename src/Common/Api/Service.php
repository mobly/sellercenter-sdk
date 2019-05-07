<?php namespace SellerCenter\SDK\Common\Api;

use ArrayAccess;
use GuzzleHttp\Command\ToArrayInterface;
use InvalidArgumentException;
use UnexpectedValueException;

/**
 * Class Service
 *
 * @package SellerCenter\SDK\Common\Api
 * @author Daniel Costa
 */
class Service implements ToArrayInterface, ArrayAccess
{
    /** @var callable */
    private $apiProvider;

    /** @var string */
    private $serviceName;

    /** @var string */
    private $apiVersion;

    /** @var array */
    private $operations = [];

    /** @var array */
    private $paginators = [];

    /** @var array */
    private $waiters = [];

    /** @var array */
    private $definition;

    /**
     * @param callable $apiProvider
     * @param string   $serviceName
     * @param string   $apiVersion
     */
    public function __construct(
        callable $apiProvider,
        $serviceName,
        $apiVersion
    ) {
        $definition = $apiProvider('api', $serviceName, $apiVersion);
        $this->apiProvider = $apiProvider;
        $this->serviceName = $serviceName;
        $this->apiVersion = $apiVersion;

        if (!isset($definition['operations'])) {
            $definition['operations'] = [];
        }

        $this->definition = $definition;
        $this->operations = $definition['operations'];
    }

    /**
     * Creates a request serializer for the provided API object.
     *
     * @param Service $api      API that contains a protocol.
     * @param string  $endpoint Endpoint to send requests to.
     *
     * @return callable
     * @throws UnexpectedValueException
     */
    public static function createSerializer(Service $api, $endpoint)
    {
        static $mapping = [
            'rest-xml'  => 'SellerCenter\SDK\Common\Api\Serializer\RestXmlSerializer'
        ];

        $protocol = $api->getProtocol();

        if (isset($mapping[$protocol])) {
            return new $mapping[$protocol]($api, $endpoint);
        } else {
            throw new UnexpectedValueException('Unknown protocol: ' . $api->getProtocol());
        }
    }

    /**
     * Creates an error parser for the given protocol.
     *
     * @param string $protocol Protocol to parse (e.g., query, json, etc.)
     *
     * @return callable
     * @throws UnexpectedValueException
     */
    public static function createErrorParser($protocol)
    {
        static $mapping = [
            'rest-xml'  => 'SellerCenter\SDK\Common\Api\ErrorParser\XmlErrorParser',
        ];

        if (!isset($mapping[$protocol])) {
            throw new UnexpectedValueException("Unknown protocol: $protocol");
        }

        return new $mapping[$protocol]();
    }

    /**
     * Applies the listeners needed to parse client models.
     *
     * @param Service $api API to create a parser for
     * @return callable
     * @throws \UnexpectedValueException
     */
    public static function createParser(Service $api)
    {
        static $mapping = [
            'rest-xml'  => 'SellerCenter\SDK\Common\Api\Parser\RestXmlParser'
        ];

        $protocol = $api->getProtocol();
        if (isset($mapping[$protocol])) {
            return new $mapping[$protocol]($api);
        } else {
            throw new \UnexpectedValueException(
                'Unknown protocol: ' . $api->getProtocol()
            );
        }
    }

    /**
     * Get the full name of the service
     *
     * @return string
     */
    public function getServiceFullName()
    {
        return $this->getMetadata('serviceFullName');
    }

    /**
     * Get the API version of the service
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->getMetadata('apiVersion');
    }

    /**
     * Get the API version of the service
     *
     * @return string
     */
    public function getEndpointPrefix()
    {
        return $this->getMetadata('endpointPrefix');
    }

    /**
     * Get the signing name used by the service.
     *
     * @return string
     */
    public function getSigningName()
    {
        return $this->getMetadata('signingName')
            ?: $this->getMetadata('endpointPrefix');
    }

    /**
     * Get the protocol used by the service.
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->getMetadata('protocol')
            ?: $this->getMetadata('type');
    }

    /**
     * Check if the description has a specific operation by name.
     *
     * @param string $name Operation to check by name
     *
     * @return bool
     */
    public function hasOperation($name)
    {
        return isset($this->definition['operations'][$name]);
    }

    /**
     * Get an operation by name.
     *
     * @param string $name Operation to retrieve by name
     *
     * @return string
     * @throws InvalidArgumentException If the operation is not found
     */
    public function getOperation($name)
    {
        if (!isset($this->operations[$name])) {
            if (!isset($this->definition['operations'][$name])) {
                throw new InvalidArgumentException('Unknown operation: ' . $name);
            }

            $this->operations[$name] = $this->definition['operations'][$name];
        }

        return $this->operations[$name];
    }

    /**
     * Get all of the operations of the description.
     *
     * @return array
     */
    public function getOperations()
    {
        $result = [];
        foreach ($this->definition['operations'] as $name => $definition) {
            $result[$name] = $this->getOperation($name);
        }

        return $result;
    }

    /**
     * Get all of the service metadata or a specific metadata key value.
     *
     * @param string|null $key Key to retrieve or null to retrieve all metadata
     *
     * @return mixed Returns the result or null if the key is not found
     */
    public function getMetadata($key = null)
    {
        if (!$key) {
            if (!isset($this->definition['metadata'])) {
                $this->definition['metadata'] = [];
            }
            return $this['metadata'];
        }

        if (isset($this->definition['metadata'][$key])) {
            return $this->definition['metadata'][$key];
        }

        return null;
    }

    public function getPaginatorConfig($operationName)
    {
        static $defaults = [
            'input_token'  => null,
            'output_token' => null,
            'limit_key'    => null,
            'result_key'   => null,
            'more_results' => null,
        ];

        if (!$this->paginators) {
            $this->paginators = call_user_func(
                $this->apiProvider,
                'paginator',
                $this->serviceName,
                $this->apiVersion
            )['pagination'];
        }

        $config = $defaults;
        if (isset($this->paginators[$operationName])) {
            $config = $this->paginators[$operationName] + $config;
        }

        return $config;
    }

    public function getWaiterConfig($name)
    {
        if (!$this->waiters) {
            $this->waiters = call_user_func(
                $this->apiProvider,
                'waiter',
                $this->serviceName,
                $this->apiVersion
            )['waiters'];
        }

        // Error if the waiter is not defined
        if (!isset($this->waiters[$name])) {
            throw new UnexpectedValueException(
                "There is no {$name} waiter defined for the {$this->serviceName} service."
            );
        }

        // Resolve the configuration for the named waiter
        if (!isset($this->waiters[$name]['waiter_name'])) {
            $this->resolveWaiterConfig($name);
        }

        return $this->waiters[$name];
    }

    private function resolveWaiterConfig($name)
    {
        static $defaults = [
            'operation'     => null,
            'ignore_errors' => [],
            'description'   => null,
            'success_type'  => null,
            'success_path'  => null,
            'success_value' => null,
            'failure_type'  => null,
            'failure_path'  => null,
            'failure_value' => null,
        ];

        $config = $this->waiters[$name];

        // Resolve extensions and defaults
        if (isset($config['extends'])) {
            $config += $this->waiters[$config['extends']];
        }
        if (isset($this->waiters['__default__'])) {
            $config += $this->waiters['__default__'];
        }
        $config += $defaults;

        // Merge acceptor settings into success/failure settings
        foreach ($config as $cfgKey => $cfgVal) {
            if (substr($cfgKey, 0, 9) == 'acceptor_') {
                $option = substr($cfgKey, 9);
                if (!isset($config["success_{$option}"])) {
                    $config["success_{$option}"] = $cfgVal;
                }
                if (!isset($config["failure_{$option}"])) {
                    $config["failure_{$option}"] = $cfgVal;
                }
                unset($config[$cfgKey]);
            }
        }

        // Add the waiter name and remove description
        $config['waiter_name'] = $name;
        unset($config['description']);

        $this->waiters[$name] = $config;
    }

    public function toArray()
    {
        return $this->definition;
    }

    public function offsetGet($offset)
    {
        return isset($this->definition[$offset])
            ? $this->definition[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        $this->definition[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->definition[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->definition[$offset]);
    }
}
