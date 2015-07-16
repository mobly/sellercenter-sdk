<?php namespace SellerCenter\Test\SDK\Common;

use SellerCenter\SDK\Common\ClientFactory;
use SellerCenter\SDK\Common\Credentials\NullCredentials;
use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\Test\SDK\SdkTestCase;
use SellerCenter\Test\SDK\UsesServiceTrait;

/**
 * Class ClientFactoryTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class ClientFactoryTest extends SdkTestCase
{
    use UsesServiceTrait;

    public function testCreatesNewClientInstances()
    {
        $f = new ClientFactory();
        $args = [
            'service'     => 'product',
            'store'       => 'mobly',
            'environment' => 'staging',
            'version'     => 'latest',
            'credentials' => ['id' => 'admin@sellercenter.net', 'key' => '1b10a679643763478e1a14511024e8b6e971b6c7']
        ];
        $c = $f->create($args);
        $this->assertInstanceOf('SellerCenter\SDK\Common\SdkClientInterface', $c);
        $this->assertNotSame($c, $f->create($args));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresRequiredArgumentsAreProvided()
    {
        $f = new ClientFactory();
        $f->create([]);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Client not found for Foo
     */
    public function testEnsuresClientClassExists()
    {
        $f = new ClientFactory();
        $f->create([
            'service'     => 'product',
            'store'       => 'mobly',
            'environment' => 'staging',
            'class_name'  => 'Foo',
            'version'     => 'latest',
        ]);
    }

    public function testCanSpecifyValidClientClass()
    {
        $f = new ClientFactory();
        $this->assertInstanceOf('SellerCenter\SDK\Product\ProductClient', $f->create([
            'service'     => 'product',
            'store'       => 'mobly',
            'environment' => 'staging',
            'version'     => 'latest',
            'credentials' => ['id' => 'admin@sellercenter.net', 'key' => '1b10a679643763478e1a14511024e8b6e971b6c7']
        ]));
    }

    /**
     * @expectedException \SellerCenter\SDK\Common\Exception\SdkException
     * @expectedExceptionMessage x
     */
    public function testCanDisableValidation()
    {
        // Validation is disabled, so server side validation is used.
        $c = (new ClientFactory())->create([
            'service'     => 'product',
            'store'       => 'mobly',
            'environment' => 'staging',
            'version'     => 'latest',
            'validate'    => false,
            'credentials' => ['id' => 'admin@sellercenter.net', 'key' => '1b10a679643763478e1a14511024e8b6e971b6c7']
        ]);
        $command = $c->getCommand('ProductUpdate', ['Request' => new ProductCollection()]);
        $command->getEmitter()->on('prepared', function () {
            throw new \Exception('Throwing!');
        });
        $c->execute($command);
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Unknown protocol: foo
     */
    public function testValidatesErrorParser()
    {
        $f = new ClientFactory();
        $provider = function () {
            return ['metadata' => ['protocol' => 'foo']];
        };
        $f->create([
            'service'     => 'product',
            'store'       => 'mobly',
            'environment' => 'staging',
            'version'     => 'latest',
            'api_provider' => $provider,
        ]);
    }

    public function testCanSpecifyValidExceptionClass()
    {
        $f = new ClientFactory();
        $f->create([
            'service'         => 'product',
            'store'           => 'mobly',
            'environment'     => 'staging',
            'exception_class' => 'SellerCenter\SDK\Common\Exception\SdkException',
            'version'         => 'latest',
            'credentials'     => ['id' => 'admin@sellercenter.net', 'key' => '1b10a679643763478e1a14511024e8b6e971b6c7']
        ]);
    }

    /**
     * @aaaexpectedException \InvalidArgumentException
     * @aaaexpectedExceptionMessage Exception not found when evaluating the exception_class argument: MissingFoo
     */
    public function testValidatesExceptionClass()
    {
        $f = new ClientFactory();
        $f->create([
            'service'         => 'product',
            'store'           => 'mobly',
            'environment'     => 'staging',
            'exception_class' => 'MissingFoo',
            'version'         => 'latest',
            'credentials'     => ['id' => 'admin@sellercenter.net', 'key' => '1b10a679643763478e1a14511024e8b6e971b6c7']
        ]);
    }

    /**
     * @aaaexpectedException \InvalidArgumentException
     * @aaaexpectedExceptionMessage Invalid signature option
     */
    public function testValidatesSignatureOption()
    {
        $f = new ClientFactory();
        $f->create([
            'service'     => 'product',
            'store'       => 'mobly',
            'environment' => 'staging',
            'signature'   => [0],
            'version'     => 'latest',
            'credentials' => ['id' => 'admin@sellercenter.net', 'key' => '1b10a679643763478e1a14511024e8b6e971b6c7']
        ]);
    }

    public function testCanCreateNullCredentials()
    {
        $creds = new NullCredentials();
        $f = new ClientFactory();
        $c = $f->create([
            'service' => 'product',
            'store' => 'mobly',
            'environment' => 'staging',
            'credentials' => $creds,
            'version' => 'latest'
        ]);
        $this->assertInstanceOf(
            'SellerCenter\SDK\Common\Credentials\NullCredentials',
            $c->getCredentials()
        );
        $this->assertSame($creds, $c->getCredentials());
    }
}
