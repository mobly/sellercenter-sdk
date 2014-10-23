<?php

namespace SellerCenter\SDK\Common\Credentials;

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
    protected $credentials;

    public function setUp()
    {
        $this->credentials = new Credentials('1b10a679643763478e1a14511024e8b6e971b6c7');
    }

    public function testConstructor()
    {
        $this->assertAttributeEquals('1b10a679643763478e1a14511024e8b6e971b6c7', 'key', $this->credentials);
    }

    public function testGetKey()
    {
        $this->assertEquals('1b10a679643763478e1a14511024e8b6e971b6c7', $this->credentials->getApiKey());
    }

    /**
     * @expectedException \SellerCenter\SDK\Exception\InvalidArgumentException
     */
    public function testSetInvalidKeyShouldThrowInvalidArgumentException()
    {
        $this->credentials->setApiKey('');
    }
}
