<?php namespace SellerCenter\Test\SDK\Feed;

use SellerCenter\SDK\Feed\FeedError;

class FeedErrorTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValues()
    {
        $feedError = new FeedError;
        $feedError->setCode(1000)->setMessage('Error message');
        $this->assertAttributeEquals(1000, 'code', $feedError);
        $this->assertAttributeEquals('Error message', 'message', $feedError);
        $this->assertEquals('Error message', $feedError->getMessage());
        $this->assertEquals(1000, $feedError->getCode());
    }
}
