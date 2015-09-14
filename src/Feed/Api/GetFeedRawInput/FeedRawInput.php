<?php namespace SellerCenter\SDK\Feed\Api\GetFeedRawInput;

use JMS\Serializer\Annotation as JMS;

/**
 * Class FeedRawInput
 *
 * @package SellerCenter\SDK\Feed\Api\GetFeedRawInput
 * @author Daniel Costa
 * @JMS\XmlRoot("FeedRawInput")
 */
class FeedRawInput
{
    /**
     * @var string
     * @JMS\SerializedName("Feed")
     * @JMS\Type("string")
     */
    protected $feed;

    /**
     * @var RawInputFile
     * @JMS\SerializedName("RawInputFile")
     * @JMS\Type("SellerCenter\SDK\Feed\Api\GetFeedRawInput\RawInputFile")
     */
    protected $rawInputFile;

    /**
     * @return string
     */
    public function getFeed()
    {
        return $this->feed;
    }

    /**
     * @param string $feed
     *
     * @return FeedRawInput
     */
    public function setFeed($feed)
    {
        $this->feed = $feed;

        return $this;
    }

    /**
     * @return RawInputFile
     */
    public function getRawInputFile()
    {
        return $this->rawInputFile;
    }

    /**
     * @param RawInputFile $rawInputFile
     *
     * @return FeedRawInput
     */
    public function setRawInputFile($rawInputFile)
    {
        $this->rawInputFile = $rawInputFile;

        return $this;
    }
}
