<?php namespace SellerCenter\Test\SDK\Feed\FeedCount;

use SellerCenter\SDK\Feed\FeedCount\FeedCount;

class FeedCountTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValues()
    {
        $feed = new FeedCount;
        $feed->setTotal(10)->setCanceled(2)->setProcessing(1)->setQueued(1)->setFinished(6);
        $this->assertAttributeEquals(10, 'total', $feed);
        $this->assertAttributeEquals(2, 'canceled', $feed);
        $this->assertAttributeEquals(1, 'processing', $feed);
        $this->assertAttributeEquals(1, 'queued', $feed);
        $this->assertAttributeEquals(6, 'finished', $feed);
        $this->assertEquals(10, $feed->getTotal());
        $this->assertEquals(2, $feed->getCanceled());
        $this->assertEquals(1, $feed->getProcessing());
        $this->assertEquals(1, $feed->getQueued());
        $this->assertEquals(6, $feed->getFinished());
    }
}
