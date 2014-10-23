<?php

namespace SellerCenter\SDK\Common\Credentials;

/**
 * Interface CredentialsInterface
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
interface CredentialsInterface
{
    /**
     * Return the API key
     *
     * @return mixed
     */
    public function getApiKey();

    /**
     * Set the API key
     *
     * @param string $key
     *
     * @return CredentialsInterface
     */
    public function setApiKey($key);
}
