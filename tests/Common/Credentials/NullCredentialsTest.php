<?php

namespace SellerCenter\SDK\Common\Credentials;

use SellerCenter\SDK\Common\Enum\ConfigEnum;

/**
 * Class CredentialsTest
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
class NullCredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Credentials
     */
    private $credentials;

    public function setUp()
    {
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
