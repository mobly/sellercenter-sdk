<?php namespace SellerCenter\SDK\Common\Credentials;

use GuzzleHttp\ToArrayInterface;

/**
 * Interface CredentialsInterface
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
interface CredentialsInterface extends ToArrayInterface
{
    /**
     * Return the API key
     *
     * @return mixed
     */
    public function getKey();

    /**
     * Return the API User ID
     *
     * @return string
     */
    public function getId();
}
