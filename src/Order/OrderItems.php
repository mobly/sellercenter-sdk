<?php namespace SellerCenter\SDK\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderItems
 *
 * @package SellerCenter\SDK\Order
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class OrderItems
{
    /**
     * @var \SellerCenter\SDK\Common\Api\Response\Success\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var OrderItems\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Order\OrderItems\Body")
     */
    protected $body;

    /**
     * @return \SellerCenter\SDK\Common\Api\Response\Success\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param \SellerCenter\SDK\Common\Api\Response\Success\Head $head
     *
     * @return OrderItems
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return OrderItems\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param OrderItems\Body $body
     *
     * @return OrderItems
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
