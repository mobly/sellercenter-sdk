<?php

namespace SellerCenter\Test\SDK\Common\Exception;

use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Message\Response;
use SellerCenter\SDK\Common\Exception\SdkException;
use SellerCenter\Test\SDK\SdkTestCase;
use SellerCenter\Test\SDK\UsesServiceTrait;

/**
 * Class SdkExceptionTest
 *
 * @package SellerCenter\SDK\Common\Exception
 * @author  Daniel Costa
 */
class SdkExceptionTest extends SdkTestCase
{
    use UsesServiceTrait;

    public function testReturnsClient()
    {
        $client = $this->getTestClient('product');
        $trans = new CommandTransaction($client, new Command('foo'));
        $exception = new SdkException('Foo', $trans);
        $this->assertSame($client, $exception->getClient());
    }

    public function testProvidesContextShortcuts()
    {
        $coll = [
            'api_error' => [
                'request_id' => '10',
                'type'       => 'mytype',
                'code'       => 'mycode'
            ]
        ];

        $client = $this->getTestClient('product');
        $trans = new CommandTransaction($client, new Command('foo'), $coll);
        $exception = new SdkException('Foo', $trans);
        $this->assertEquals('10', $exception->getApiRequestId());
        $this->assertEquals('10', $exception->getRequestId());

        $this->assertEquals('mytype', $exception->getApiErrorType());
        $this->assertEquals('mytype', $exception->getExceptionType());

        $this->assertEquals('mycode', $exception->getApiErrorCode());
        $this->assertEquals('mycode', $exception->getExceptionCode());
    }

    public function testReturnsServiceName()
    {
        $client = $this->getTestClient('product');
        $trans = new CommandTransaction($client, new Command('foo'));
        $exception = new SdkException('Foo', $trans);
        $this->assertSame('Product', $exception->getServiceName());
    }

    public function testReturnsStatusCode()
    {
        $client = $this->getTestClient('product');
        $trans = new CommandTransaction($client, new Command('foo'));
        $trans->response = new Response(400);
        $exception = new SdkException('Foo', $trans);
        $this->assertEquals(400, $exception->getStatusCode());
    }
}
