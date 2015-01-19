<?php

namespace SellerCenter\SDK\Test\Common;
use SellerCenter\SDK\Common\Result;

/**
 * Class ResultTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class ResultTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $c = new Result(['a' => 'b', 'c' => 'd']);
        $this->assertEquals('b', $c['a']);
        $this->assertEquals('d', $c['c']);
        $this->assertEquals('d', $c->get('c'));
        $this->assertTrue($c->hasKey('c'));
        $this->assertFalse($c->hasKey('f'));
        $this->assertEquals('b', $c->search('a'));
        $this->assertContains('Model Data', (string) $c);
    }
}
