<?php

namespace SellerCenter\SDK\Common\Signature;

use DateTime;
use GuzzleHttp\Message\RequestInterface;
use SellerCenter\SDK\Common\Credentials\CredentialsInterface;

/**
 * Class SignatureV1
 *
 * @package SellerCenter\SDK\Common\Signature
 * @author  Daniel Costa
 */
class SignatureV1 extends AbstractSignature
{
    /**
     * Signs the specified request with an SellerCenter API signing protocol by using the
     * provided SellerCenter API credentials and adding the required headers to the request
     *
     * @param RequestInterface     $request     Request to add a signature to
     * @param CredentialsInterface $credentials Signing credentials
     */
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        $parameters = [
            'UserID' => $credentials->getId(),
            'Version' => '1.0',
            'Action' => $request->getConfig()->get('command')->getName(),
            'Timestamp' => gmdate(DateTime::ISO8601),
        ];

        // the keys MUST be in alphabetical order to correct signature calculation
        ksort($parameters);

        $parameters['Signature'] = rawurlencode(
            hash_hmac(
                'sha256',
                http_build_query($parameters, '', '&', PHP_QUERY_RFC3986),
                $credentials->getKey(),
                false
            )
        );

        $request->getQuery()->merge($parameters);
    }
}
