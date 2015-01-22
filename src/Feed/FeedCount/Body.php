<?php

namespace SellerCenter\SDK\Feed\FeedCount;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\FailureReason
 * @author Daniel Costa
 */
class Body
{
    /**
     * @var FeedCount
     * @JMS\SerializedName("FeedCount")
     * @JMS\Type("SellerCenter\SDK\Feed\FeedCount\FeedCount")
     */
    protected $feedCount;

    /**
     * @return FeedCount
     */
    public function getFeedCount()
    {
        return $this->feedCount;
    }

    /**
     * @param FeedCount $reasons
     *
     * @return ArrayCollection
     */
    public function setFeedCount($reasons)
    {
        $this->feedCount = $reasons;

        return $this;
    }
}
