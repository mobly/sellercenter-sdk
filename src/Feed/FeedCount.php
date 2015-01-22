<?php

namespace SellerCenter\SDK\Feed;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderItems
 *
 * @package SellerCenter\SDK\Feed
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class FeedCount
{
    /**
     * @var \SellerCenter\SDK\Common\Api\SuccessResponse\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\SuccessResponse\Head")
     */
    protected $head;

    /**
     * @var FeedCount\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Feed\FeedCount\Body")
     */
    protected $body;

    /**
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param \SellerCenter\SDK\Common\Api\SuccessResponse\Head $head
     *
     * @return FeedCount
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return FeedCount\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param FeedCount\Body $body
     *
     * @return FeedCount
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
