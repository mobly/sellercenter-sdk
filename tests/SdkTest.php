<?php
namespace SellerCenter\Test\SDK;

use GuzzleHttp\Event\EmitterInterface;
use SellerCenter\SDK\Sdk;

//use JmesPath\Env as JmesPath;

class SdkTest extends SdkTestCase
{
    /**
     * @expectedException \BadMethodCallException
     */
    public function testEnsuresMissingMethodThrowsExceptionWhenCalledFromInstance()
    {
        (new Sdk())->foo();
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testEnsuresMissingMethodThrowsExceptionWhenCalledStatically()
    {
        Sdk::foo();
    }

    public function testHasMagicMethods()
    {
        $sdk = $this->getMockBuilder('SellerCenter\SDK\Sdk')
            ->setMethods(['getClient'])
            ->getMock();
        $sdk->expects($this->once())
            ->method('getClient')
            ->with('Foo', ['bar' => 'baz']);
        $sdk->getFoo(['bar' => 'baz']);
    }

    public function testCreatesClients()
    {
        $this->assertInstanceOf(
            'SellerCenter\SDK\Common\SdkClientInterface',
            (new Sdk())->getProduct([
                'store'  => 'mobly',
                'environment' => 'staging',
                'credentials' => [
                    'id' => 'admin@sellercenter.com',
                    'key' => '1234567890123456789012345678901234567890',
                ]
            ])
        );

        $this->assertInstanceOf(
            'SellerCenter\SDK\Common\SdkClientInterface',
            Sdk::getProduct([
                'store'  => 'mobly',
                'environment' => 'staging',
                'credentials' => [
                    'id' => 'admin@sellercenter.com',
                    'key' => '1234567890123456789012345678901234567890',
                ]
            ])
        );
    }

    public function testMergesInstanceArgsWithStoredArgs()
    {
        $sdk = new Sdk([
            'a' => 'a1',
            'b' => 'b1',
            'c' => 'c1',
            'foo' => ['b' => 'b2']
        ]);

        $customFactories = (new \ReflectionObject($sdk))
            ->getProperty('factories');
        $customFactories->setAccessible(true);

        $current = $customFactories->getValue($sdk);
        $customFactories->setValue($sdk, [
            'foo' => __NAMESPACE__ . '\\FooFactory'
        ]);
        $args = $sdk->getFoo(['c' => 'c2', 'd' => 'd1']);

        $this->assertEquals('a1', $args['a']);
        $this->assertEquals('b2', $args['b']);
        $this->assertEquals('c2', $args['c']);
        $this->assertEquals('d1', $args['d']);
        $customFactories->setValue($sdk, $current);
    }
}

class FooFactory
{
    function create($args) {
        return $args;
    }
}
