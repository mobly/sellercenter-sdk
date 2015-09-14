<?php namespace SellerCenter\Test\SDK\Feed;

use Doctrine\Common\Collections\ArrayCollection;
use SellerCenter\SDK\Feed\Feed;

class FeedTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValues()
    {
        $feed = new Feed;
        $feed->setFeed('a')
            ->setCreationDate(\DateTime::createFromFormat(DATE_ISO8601, '2015-08-01T12:30:00+0000'))
            ->setUpdatedDate(\DateTime::createFromFormat(DATE_ISO8601, '2015-08-01T12:31:00+0000'))
            ->setAction('Image')
            ->setSource('api')
            ->setStatus('Queued')
            ->setTotalRecords(3)
            ->setProcessedRecords(2)
            ->setFailedRecords(1)
            ->setFeedErrors(new ArrayCollection);
        $this->assertAttributeEquals('a', 'feed', $feed);
        $this->assertAttributeEquals('Image', 'action', $feed);
        $this->assertAttributeEquals('api', 'source', $feed);
        $this->assertAttributeEquals('Queued', 'status', $feed);
        $this->assertAttributeEquals(3, 'totalRecords', $feed);
        $this->assertAttributeEquals(2, 'processedRecords', $feed);
        $this->assertAttributeEquals(1, 'failedRecords', $feed);
        $this->assertEquals('a', $feed->getFeed());
        $this->assertEquals('Image', $feed->getAction());
        $this->assertEquals('api', $feed->getSource());
        $this->assertEquals('Queued', $feed->getStatus());
        $this->assertEquals(3, $feed->getTotalRecords());
        $this->assertEquals(2, $feed->getProcessedRecords());
        $this->assertEquals(1, $feed->getFailedRecords());
        $this->assertEquals('2015-08-01T12:30:00+0000', $feed->getCreationDate()->format(DATE_ISO8601));
        $this->assertEquals('2015-08-01T12:31:00+0000', $feed->getUpdatedDate()->format(DATE_ISO8601));
        $this->assertCount(0, $feed->getFeedErrors());
    }
}
