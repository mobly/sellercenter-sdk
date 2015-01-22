<?php

namespace SellerCenter\Test\SDK\Common\Credentials;

use SellerCenter\SDK\Common\Credentials\NullCredentials;
use SellerCenter\SDK\Common\Enum\ConfigEnum;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class CredentialsTest
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
class NullCredentialsTest extends SdkTestCase
{
    /**
     * @var Credentials
     */
    private $credentials;

    public function setUp()
    {
        parent::setUp();

        $this->credentials = new NullCredentials();
    }

    public function testGetKey()
    {
        $this->assertEquals('', $this->credentials->getKey());
    }

    public function testGetId()
    {
        $this->assertEquals('', $this->credentials->getId());
    }

    public function testToArray()
    {
        $expected = [
            ConfigEnum::ID => '',
            ConfigEnum::KEY => ''
        ];
        $this->assertEquals($expected, $this->credentials->toArray());
    }
}
