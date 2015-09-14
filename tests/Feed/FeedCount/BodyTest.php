<?php namespace SellerCenter\Test\SDK\Feed\FeedCount;

use SellerCenter\SDK\Feed\FeedCount\Body;
use SellerCenter\SDK\Feed\FeedCount\FeedCount;

class BodyTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValues()
    {
        $feed = new FeedCount;
        $feed->setTotal(10)->setCanceled(2)->setProcessing(1)->setQueued(1)->setFinished(6);

        $body = new Body;
        $body->setFeedCount($feed);

        $this->assertEquals($feed, $body->getFeedCount());
    }
}
