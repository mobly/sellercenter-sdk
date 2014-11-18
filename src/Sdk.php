<?php

namespace SellerCenter\SDK;

use BadMethodCallException;
use InvalidArgumentException;
use SellerCenter\SDK\Common\ClientFactory;
use SellerCenter\SDK\Common\SdkClientInterface;
use SellerCenter\SDK\Product\ProductClient;

/**
 * Class Sdk
 *
 * Builds SellerCenter API clients based on configuration settings.
 *
 * @method ProductClient getProduct(array $args = [])
 *
 * @package SellerCenter\SDK
 * @author  Daniel Costa
 */
class Sdk
{
    const VERSION = '1.0.0-beta.1';

    /**
     * Map of service lowercase names to service class names.
     *
     * @var array
     */
    private static $services = [
        'product' => 'Product'
    ];

    private static $factories = [];

    /** @var array Arguments for creating clients */
    private $args;

    /**
     * Constructs a new SDK object with an associative array of default
     * client settings.
     *
     * @param array $args
     *
     * @throws InvalidArgumentException
     * @see SellerCenter\SDK\Sdk::getClient for a list of available options.
     */
    public function __construct(array $args = [])
    {
        $this->args = $args;
    }

    public function __call($name, array $args = [])
    {
        if (strpos($name, 'get') === 0) {
            return $this->getClient(
                substr($name, 3),
                isset($args[0]) ? $args[0] : []
            );
        }

        throw new BadMethodCallException("Unknown method: {$name}.");
    }

    /**
     * Get a client by name using an array of constructor options.
     *
     * - store: The store of the service to use.
     * - environment: The environment of the service to use.
     * - version: API version of the service.
     * - credentials: An {@see SellerCenter\SDK\Common\Credentials\CredentialsInterface}
     *   object to use with each client OR an associative array of 'key',
     *   'secret', and 'token' key value pairs. If no credentials are provided,
     *   the SDK will attempt to load them from the environment.
     * - signature: A string representing a custom signature version to use
     *   with a service or a {@see SellerCenter\SDK\Signture\SignatureInterface} object.
     * - client: Optional {@see GuzzleHttp\ClientInterface} used to transfer
     *   requests over the wire.
     * - scheme: The scheme to use when interacting with a service (https or
     *   http). Defaults to https.
     *
     * @param string $name Client name
     * @param array  $args Custom arguments to provide to the client.
     *
     * @return SdkClientInterface
     * @throws InvalidArgumentException
     */
    public function getClient($name, array $args = [])
    {
        // Normalize service name to lower case
        $name = strtolower($name);

        // Merge provided args with stored args
        if (isset($this->args[$name])) {
            $args += $this->args[$name];
        }
        $args += $this->args;

        // Set the service name and determine if it is linked to a known class
        $args['service'] = $name;
        $args['class_name'] = false;
        if (isset(self::$services[$name])) {
            $args['class_name'] = self::$services[$name];
        }

        // Get the client factory for the service
        $factory = isset(self::$factories[$name])
            ? new self::$factories[$name]
            : new ClientFactory;

        return $factory->create($args);
    }
}
