<?php namespace SellerCenter\Test\SDK\Common;

use SellerCenter\SDK\Common\Result;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Class ResultTest
 *
 * @package SellerCenter\SDK\Common
 * @author  Daniel Costa
 */
class ResultTest extends SdkTestCase
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
