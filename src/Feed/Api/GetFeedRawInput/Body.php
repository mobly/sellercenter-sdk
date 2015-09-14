<?php namespace SellerCenter\SDK\Feed\Api\GetFeedRawInput;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Feed\Api\GetFeedRawInput
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body
{
    /**
     * @var FeedRawInput
     * @JMS\SerializedName("FeedRawInput")
     * @JMS\Type("SellerCenter\SDK\Feed\Api\GetFeedRawInput\FeedRawInput")
     * @JMS\XmlList(entry="Brand")
     */
    protected $feedRawInput;

    /**
     * @return FeedRawInput
     */
    public function getFeedRawInput()
    {
        return $this->feedRawInput;
    }

    /**
     * @param FeedRawInput $feedRawInput
     *
     * @return Body
     */
    public function setFeedRawInput($feedRawInput)
    {
        $this->feedRawInput = $feedRawInput;

        return $this;
    }
}
