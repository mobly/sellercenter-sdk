<?php

namespace SellerCenter\SDK\Order;

use SellerCenter\SDK\Order\Status\ToCancel;

trait OrderItemIdTrait
{
    /** @var int */
    protected $orderItemId;

    /**
     * @return int
     */
    public function getOrderItemId()
    {
        return $this->orderItemId;
    }

    /**
     * @param int $orderItemId
     *
     * @return \SellerCenter\SDK\Order\Status\ToCancel
     */
    public function setOrderItemId($orderItemId)
    {
        $this->orderItemId = $orderItemId;

        return $this;
    }
}
