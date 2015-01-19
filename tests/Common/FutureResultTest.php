<?php

namespace SellerCenter\SDK\Test\Common;

use React\Promise\FulfilledPromise;
use SellerCenter\SDK\Common\FutureResult;
use SellerCenter\SDK\Common\Result;

/**
 * Class FutureResultTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class FutureResultTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
        $this->assertEquals(['a' => 1], $c->wait()->toArray());
    }

    public function testResultCanBeToArray()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['foo' => 'bar'])));
        $c->wait();
        $this->assertEquals('bar', $c['foo']);
        $this->assertEquals(1, count($c));
    }

    public function testResultCanBeSearched()
    {
        $c = new FutureResult(
            new FulfilledPromise(
                new Result(['foo' => ['bar' => 'baz']])
            )
        );
        $this->assertEquals('baz', $c->search('foo.bar'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testValidatesResult()
    {
        $c = new FutureResult(new FulfilledPromise('foo'));
        $c->wait();
    }

    public function testProxiesToUnderlyingData()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
        $this->assertEquals(1, count($c));
        $this->assertEquals(['a' => 1], $c->toArray());
        $this->assertEquals(['a' => 1], $c->getIterator()->getArrayCopy());
        $this->assertEquals(1, $c['a']);
        $this->assertEquals(1, $c->get('a'));
        $this->assertNull($c['b']);
        $this->assertTrue(isset($c['a']));
        $c['b'] = 2;
        $this->assertTrue(isset($c['b']));
        unset($c['b']);
        $this->assertFalse(isset($c['b']));
        $this->assertEquals(1, $c->getPath('a'));
        $c->setPath('foo/bar', 'baz');
        $this->assertEquals('baz', $c['foo']['bar']);
        $this->assertTrue($c->hasKey('a'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testThrowsWhenPropertyInvalid()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
        $c->notThere;
    }

    /**
     * @expectedException \GuzzleHttp\Ring\Exception\CancelledFutureAccessException
     */
    public function testThrowsWhenAccessingCancelledFuture()
    {
        $c = new FutureResult(new FulfilledPromise(new Result([])));
        $c->cancel();
        $c['foo'];
    }

    public function testToString()
    {
        $c = new FutureResult(new FulfilledPromise(new Result(['a' => 1])));
        $expected =
            "Model Data\n" .
            "----------\n" .
            "Data can be retrieved from the model object using the get() method of the\n" .
            "model (e.g., `\$result->get(\$key)`) or \"accessing the result like an\n" .
            "associative array (e.g. `\$result['key']`). You can also execute JMESPath\n" .
            "expressions on the result data using the search() method.\n" .
            "\n" .
            "{\n" .
            "    \"a\": 1\n" .
            "}\n";

        $this->assertEquals($expected, (string) $c);
    }
}
