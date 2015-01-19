<?php

namespace SellerCenter\SDK\Test\Common;
use SellerCenter\SDK\Common\RulesEndpointProvider;

/**
 * Class RulesEndpointProviderTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class RulesEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \SellerCenter\SDK\Common\Exception\UnresolvedEndpointException
     */
    public function testThrowsWhenEndpointIsNotResolved()
    {
        $e = new RulesEndpointProvider(['foo' => ['rules' => []]]);
        call_user_func($e, ['service' => 'foo', 'store' => 'mobly', 'environment' => 'staging']);
    }

    public function endpointProvider()
    {
        return [
            [
                ['store' => 'mobly', 'environment' => 'staging'],
                ['endpoint' => 'https://sellercenter-api-staging.mobly.com.br', 'signatureVersion' => 'v1']
            ]
        ];
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testResolvesEndpoints($input, $output)
    {
        // Use the default endpoints file
        $p = RulesEndpointProvider::fromDefaults();
        $this->assertEquals($output, call_user_func($p, $input));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "environment" value
     */
    public function testEnsuresService()
    {
        $p = RulesEndpointProvider::fromDefaults();
        call_user_func($p, ['store' => 'mobly']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "store" value
     */
    public function testEnsuresVersion()
    {
        $p = RulesEndpointProvider::fromDefaults();
        call_user_func($p, ['environment' => 'staging']);
    }
}
