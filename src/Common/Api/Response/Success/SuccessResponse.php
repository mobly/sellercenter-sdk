<?php namespace SellerCenter\SDK\Common\Api\Response\Success;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success;

/**
 * Class SuccessResponse
 *
 * @package SellerCenter\SDK\Common\Api
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class SuccessResponse
{
    /**
     * @var Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Body")
     */
    protected $body;

    /**
     * @return Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param Head $head
     *
     * @return SuccessResponse
     */
    public function setHead(Head $head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param Body $body
     *
     * @return SuccessResponse
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
