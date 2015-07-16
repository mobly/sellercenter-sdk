<?php namespace SellerCenter\SDK\Common\Signature;

use GuzzleHttp\Message\RequestInterface;
use SellerCenter\SDK\Common\Credentials\CredentialsInterface;

/**
 * Interface SignatureInterface
 *
 * @package SellerCenter\SDK\Common\Signature
 * @author  Daniel Costa
 */
interface SignatureInterface
{
    /**
     * Signs the specified request with an SellerCenter API signing protocol by using the
     * provided SellerCenter API credentials and adding the required headers to the request
     *
     * @param RequestInterface     $request     Request to add a signature to
     * @param CredentialsInterface $credentials Signing credentials
     */
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials);
}
