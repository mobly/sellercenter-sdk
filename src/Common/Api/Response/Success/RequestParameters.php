<?php namespace SellerCenter\SDK\Common\Api\Response\Success;

use JMS\Serializer\Annotation as JMS;

/**
 * Class RequestParameters
 *
 * @package SellerCenter\SDK\Common\Api\Response\Success
 * @author  Daniel Costa
 */
class RequestParameters
{
    /**
     * @var string
     * @JMS\SerializedName("FeedID")
     * @JMS\Type("string")
     */
    private $feedId;

    /**
     * @return string
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * @param string $feedId
     */
    public function setFeedId($feedId)
    {
        $this->feedId = $feedId;
    }
}
