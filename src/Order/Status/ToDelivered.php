<?php namespace SellerCenter\SDK\Order\Status;

use SellerCenter\SDK\Order\OrderItemIdTrait;

class ToDelivered
{
    use OrderItemIdTrait;

    public function __construct($orderItemId)
    {
        $this->setOrderItemId($orderItemId);
    }
}
