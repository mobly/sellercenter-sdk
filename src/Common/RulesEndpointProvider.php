<?php namespace SellerCenter\SDK\Common;

use SellerCenter\SDK\Common\Exception\UnresolvedEndpointException;
use GuzzleHttp\Utils;

/**
 * Class RulesEndpointProvider
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class RulesEndpointProvider
{
    /** @var array */
    private $patterns;

    /**
     * @param array $patterns Hash of endpoint patterns mapping to endpoint
     *                        configurations.
     */
    public function __construct(array $patterns)
    {
        $this->patterns = $patterns;
    }

    /**
     * Creates and returns the default RulesEndpointProvider based on the
     * public rule sets.
     *
     * @return self
     */
    public static function fromDefaults()
    {
        $data = require __DIR__ . '/Resources/endpoints.php';

        return new self($data['endpoints']);
    }

    public function __invoke(array $args = [])
    {
        if (!isset($args['store'])) {
            throw new \InvalidArgumentException('Requires a "store" value');
        }

        if (!isset($args['environment'])) {
            throw new \InvalidArgumentException('Requires a "environment" value');
        }

        foreach ($this->getKeys($args['store'], $args['environment']) as $key) {
            if (isset($this->patterns[$key])) {
                return $this->expand($this->patterns[$key], $args);
            }
        }

        throw new UnresolvedEndpointException(
            'Could not resolve a valid endpoint to ' . $args['store'] . '-' . $args['environment']
        );
    }

    /**
     * Return endpoint keys in order of precedence
     *
     * @param string $store
     * @param string $environment
     *
     * @return array
     */
    private function getKeys($store, $environment)
    {
        return ["$store/$environment", "$store/*", "*/$environment", "*/*"];
    }

    /**
     * Expand config array with URI endpoint
     *
     * @param array $config
     * @param array $args
     *
     * @return array
     */
    private function expand(array $config, array $args)
    {
        $scheme = isset($args['scheme']) ? $args['scheme'] : 'https';
        $config['endpoint'] = $scheme . '://' . Utils::uriTemplate($config['endpoint'], $args);

        return $config;
    }
}
