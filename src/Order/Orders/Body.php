<?php

namespace SellerCenter\SDK\Order\Orders;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\Orders
 * @author Daniel Costa
 */
class Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Orders")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Order\Orders\Order>")
     * @JMS\XmlList(entry="Order")
     */
    protected $orders;

    /**
     * @return ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param ArrayCollection $orders
     *
     * @return Body
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }
}
