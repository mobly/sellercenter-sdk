<?php

namespace SellerCenter\SDK\Common\Credentials;

use SellerCenter\SDK\Exception\InvalidArgumentException;

/**
 * Basic implementation of the SellerCenter API credentials that
 * allows callers to pass in the API key in the constructor
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
class Credentials implements CredentialsInterface
{
    /**
     * SellerCenter API key
     *
     * @var string with 40 characters
     */
    protected $key;

    /**
     * @param string $key
     */
    public function __construct($key)
    {
        $this->setApiKey($key);
    }

    /**
     * Return the API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->key;
    }

    /**
     * Set the API key
     *
     * @param string $key
     *
     * @return CredentialsInterface
     */
    public function setApiKey($key)
    {
        if (!is_string($key) || strlen($key) != 40) {
            throw new InvalidArgumentException('API key should be a string with 40 characters');
        }

        $this->key = $key;

        return $this;
    }
}
