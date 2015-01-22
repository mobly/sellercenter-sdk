<?php

namespace SellerCenter\SDK\Order\StatusToReadyToShip;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Reason
 *
 * @package SellerCenter\SDK\Order\StatusToReadyToShip
 * @author Daniel Costa
 */
class OrderItem
{
    /**
     * @var int
     * @JMS\SerializedName("PurchaseOrderId")
     * @JMS\Type("integer")
     */
    protected $purchaseOrderId;

    /**
     * @var string
     * @JMS\SerializedName("PurchaseOrderNumber")
     * @JMS\Type("string")
     */
    protected $purchaseOrderNumber;

    /**
     * @return int
     */
    public function getPurchaseOrderId()
    {
        return $this->purchaseOrderId;
    }

    /**
     * @param int $purchaseOrderId
     *
     * @return OrderItem
     */
    public function setPurchaseOrderId($purchaseOrderId)
    {
        $this->purchaseOrderId = $purchaseOrderId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseOrderNumber()
    {
        return $this->purchaseOrderNumber;
    }

    /**
     * @param string $purchaseOrderNumber
     *
     * @return OrderItem
     */
    public function setPurchaseOrderNumber($purchaseOrderNumber)
    {
        $this->purchaseOrderNumber = $purchaseOrderNumber;

        return $this;
    }
}
