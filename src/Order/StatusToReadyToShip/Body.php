<?php namespace SellerCenter\SDK\Order\StatusToReadyToShip;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\StatusToReadyToShip
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("OrderItems")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Order\StatusToReadyToShip\OrderItem>")
     * @JMS\XmlList(entry="OrderItem")
     */
    protected $orderItems;

    /**
     * @return ArrayCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param array $orderItems
     *
     * @return ArrayCollection
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;

        return $this;
    }
}
