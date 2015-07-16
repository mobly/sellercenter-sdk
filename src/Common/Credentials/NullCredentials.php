<?php namespace SellerCenter\SDK\Common\Credentials;

/**
 * Class NullCredentials
 *
 * A blank set of credentials. API clients must be provided credentials, but
 * there are some types of requests that do not need authentication. This class
 * can be used to pivot on that scenario, and also serve as a mock credentials
 * object when testing.
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
class NullCredentials implements CredentialsInterface
{
    public function getId()
    {
        return '';
    }

    public function getKey()
    {
        return '';
    }

    public function toArray()
    {
        return [
            'id'  => '',
            'key' => '',
        ];
    }
}
