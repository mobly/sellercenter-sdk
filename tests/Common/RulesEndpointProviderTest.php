<?php namespace SellerCenter\Test\SDK\Common;

use SellerCenter\SDK\Common\RulesEndpointProvider;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class RulesEndpointProviderTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class RulesEndpointProviderTest extends SdkTestCase
{
    /**
     * @expectedException \SellerCenter\SDK\Common\Exception\UnresolvedEndpointException
     */
    public function testThrowsWhenEndpointIsNotResolved()
    {
        $e = new RulesEndpointProvider(['foo' => ['rules' => []]]);
        call_user_func($e, ['service' => 'foo', 'store' => 'mobly-br', 'environment' => 'staging']);
    }

    public function endpointProvider()
    {
        return [
            [
                ['store' => 'mobly-br', 'environment' => 'staging'],
                ['endpoint' => 'https://sellercenter-api-staging.mobly.com.br', 'signatureVersion' => 'v1'],
                true
            ],
            [
                ['store' => 'unmapped-store', 'environment' => 'production'],
                ['endpoint' => null, 'signatureVersion' => null],
                false
            ],
        ];
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testResolvesEndpoints($input, $output, $valid)
    {
        // Use the default endpoints file
        $p = RulesEndpointProvider::fromDefaults();
        if ($valid) {
            $this->assertEquals($output, call_user_func($p, $input));
        } else {
            $this->setExpectedException(
                'SellerCenter\SDK\Common\Exception\UnresolvedEndpointException',
                'Could not resolve a valid endpoint to ' . $input['store'] . '-' . $input['environment']
            );
            call_user_func($p, $input);
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "environment" value
     */
    public function testEnsuresService()
    {
        $p = RulesEndpointProvider::fromDefaults();
        call_user_func($p, ['store' => 'mobly-br']);
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
