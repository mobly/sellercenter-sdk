<?php

namespace SellerCenter\SDK\Order\OrderItems;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\Order
 * @author Daniel Costa
 */
class Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("OrderItems")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Order\OrderItems\OrderItem>")
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
     * @param ArrayCollection $orderItems
     *
     * @return Body
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;

        return $this;
    }
}
