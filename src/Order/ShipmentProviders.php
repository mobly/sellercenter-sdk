<?php namespace SellerCenter\SDK\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ShipmentProviders
 *
 * @package SellerCenter\SDK\Order
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class ShipmentProviders
{
    /**
     * @var \SellerCenter\SDK\Common\Api\Response\Success\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var ShipmentProviders\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Order\ShipmentProviders\Body")
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
     * @return ShipmentProviders
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return ShipmentProviders\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param ShipmentProviders\Body $body
     *
     * @return ShipmentProviders
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
