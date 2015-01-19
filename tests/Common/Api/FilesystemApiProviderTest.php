<?php

namespace SellerCenter\SDK\Test\Common\Api;

use SellerCenter\SDK\Common\Api\FilesystemApiProvider;

class FilesystemApiProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresDirectoryIsValid()
    {
        new FilesystemApiProvider('/path/to/invalid/dir');
    }

    public function testPathAndSuffixSetCorrectly()
    {
        $p1 = new FilesystemApiProvider(__DIR__ . '/');
        $this->assertEquals(__DIR__, $this->readAttribute($p1, 'path'));
    }

    public function testEnsuresValidJson()
    {
        $path = sys_get_temp_dir() . '/invalid-2010-12-05.api.json';
        file_put_contents($path, 'foo, bar');
        $p = new FilesystemApiProvider(sys_get_temp_dir());
        try {
            call_user_func($p, 'api', 'invalid', '2010-12-05');
            $this->fail('Did not throw');
        } catch (\InvalidArgumentException $e) {
            unlink($path);
        }
    }

    public function testCanLoadPhpFiles()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        $this->assertEquals(
            [],
            $p('api', 'product', 'v1')
        );
    }

    public function testReturnsLatestServiceData()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        $this->assertEquals(
            ['foo' => 'bar'],
            call_user_func($p, 'api', 'product', 'latest')
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unknown type: xapi
     */
    public function testThrowsWhenInvalidType()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        call_user_func($p, 'xapi', 'product', 'latest');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testThrowsWhenCannotOpenFile()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        call_user_func($p, 'api', 'xproduct', 'v1');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage There are no versions of the dodo service available
     */
    public function testThrowsWhenNoLatestVersionIsAvailable()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        call_user_func($p, 'api', 'dodo', 'latest');
    }

    public function testReturnsPaginatorConfigs()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        $result = call_user_func($p, 'paginator', 'product', 'latest');
        $this->assertEquals(['abc' => '123'], $result);
        $result = call_user_func($p, 'paginator', 'product', 'v1');
        $this->assertEquals([], $result);
    }

    public function testReturnsWaiterConfigs()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/fixtures/api_provider');
        $result = call_user_func($p, 'waiter', 'product', 'latest');
        $this->assertEquals(['abc' => '456'], $result);
        $result = call_user_func($p, 'waiter', 'product', 'v1');
        $this->assertEquals([], $result);
    }
}
