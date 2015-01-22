<?php

namespace SellerCenter\Test\SDK\Common\Subscriber;

use SellerCenter\SDK\Common\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use SellerCenter\SDK\Common\Subscriber\Signature;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class SignatureTest
 *
 * @package SellerCenter\SDK\Common\Subscriber
 * @author  Daniel Costa
 */
class SignatureTest extends SdkTestCase
{
    public function testSignsRequests()
    {
        $client = new Client();
        $client->getEmitter()->attach(new Mock([new Response(200)]));
        $credentials = new Credentials('admin@sellercenter.net', 'abc16cfd7e7fa8263b8b83eb3b4467e60ca0638b');
        $signer = $this->getMockBuilder('SellerCenter\SDK\Common\Signature\SignatureInterface')
            ->setMethods(['signRequest'])
            ->getMockForAbstractClass();
        $subscriber = new Signature($credentials, $signer);
        $client->getEmitter()->attach($subscriber);
        $request = $client->createRequest('GET', 'http://foo.com');
        $signer->expects($this->once())
            ->method('signRequest')
            ->with($request, $credentials);

        $client->send($request);
    }
}
