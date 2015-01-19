<?php

namespace SellerCenter\SDK\Test\Common\Credentials;

use SellerCenter\SDK\Common\Credentials\Credentials;
use SellerCenter\SDK\Common\Enum\ConfigEnum;

/**
 * Class CredentialsTest
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Credentials
     */
    private $credentials;

    public function setUp()
    {
        $this->credentials = new Credentials('admin@sellercenter.com', '1b10a679643763478e1a14511024e8b6e971b6c7');
    }

    public function testConfigDefaults()
    {
        $expected = array(
            ConfigEnum::KEY => null,
            ConfigEnum::ID => null,
        );
        $this->assertEquals($expected, Credentials::getConfigDefaults());
    }

    public function testFactory()
    {
        $config = array(
            ConfigEnum::KEY => '1b10a679643763478e1a14511024e8b6e971b6c7',
            ConfigEnum::ID => 'admin@sellercenter.com',
        );
        Credentials::factory($config);
    }

    public function testConstructor()
    {
        $this->assertAttributeEquals('1b10a679643763478e1a14511024e8b6e971b6c7', 'key', $this->credentials);
    }

    public function testGetKey()
    {
        $this->assertEquals('1b10a679643763478e1a14511024e8b6e971b6c7', $this->credentials->getKey());
    }

    public function testGetId()
    {
        $this->assertEquals('admin@sellercenter.com', $this->credentials->getId());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidKeyShouldThrowInvalidArgumentException()
    {
        $this->credentials->setKey('');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidIdShouldThrowInvalidArgumentException()
    {
        $this->credentials->setId('admin.sellercenter');
    }

    public function testToArray()
    {
        $expected = [
            ConfigEnum::ID => 'admin@sellercenter.com',
            ConfigEnum::KEY => '1b10a679643763478e1a14511024e8b6e971b6c7'
        ];
        $this->assertEquals($expected, $this->credentials->toArray());
    }
}
