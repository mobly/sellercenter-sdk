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
class FeedList
{
    /**
     * @var \SellerCenter\SDK\Common\Api\SuccessResponse\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\SuccessResponse\Head")
     */
    protected $head;

    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Body")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Feed\Feed>")
     * @JMS\XmlList(entry="Feed")
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
     * @return FeedList
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param ArrayCollection $body
     *
     * @return FeedList
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
