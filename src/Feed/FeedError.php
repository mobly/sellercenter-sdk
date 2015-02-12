<?php namespace SellerCenter\SDK\Feed;

use JMS\Serializer\Annotation as JMS;

/**
 * Class FeedError
 *
 * @package SellerCenter\SDK\Feed
 * @JMS\XmlRoot("Error")
 */
class FeedError
{
    /**
     * @var int
     * @JMS\SerializedName("Code")
     * @JMS\Type("integer")
     */
    protected $code;

    /**
     * @var string
     * @JMS\SerializedName("Message")
     * @JMS\Type("string")
     */
    protected $message;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return FeedError
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     *
     * @return FeedError
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
