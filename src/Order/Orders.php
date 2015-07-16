<?php namespace SellerCenter\SDK\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Orders
 *
 * @package SellerCenter\SDK\Order
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class Orders
{
    /**
     * @var \SellerCenter\SDK\Common\Api\Response\Success\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var Orders\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Order\Orders\Body")
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
     * @return Orders
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return Orders\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param Orders\Body $body
     *
     * @return Orders
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
