<?php namespace SellerCenter\SDK\Order\StatusToPackedByMarketplace;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\StatusToPackedByMarketplace
 * @author Mangierre Martins
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("OrderItems")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Order\StatusToPackedByMarketplace\OrderItem>")
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
