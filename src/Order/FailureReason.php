<?php

namespace SellerCenter\SDK\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class FailureReason
 *
 * @package SellerCenter\SDK\Order
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class FailureReason
{
    /**
     * @var \SellerCenter\SDK\Common\Api\SuccessResponse\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\SuccessResponse\Head")
     */
    protected $head;

    /**
     * @var FailureReason\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Order\FailureReason\Body")
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
     * @return FailureReason
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return FailureReason\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param FailureReason\Body $body
     *
     * @return FailureReason
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
