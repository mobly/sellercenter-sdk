<?php

namespace SellerCenter\SDK\Order\Status;

use SellerCenter\SDK\Order\OrderItemIdTrait;

class ToShipped
{
    use OrderItemIdTrait;

    public function __construct($orderItemId)
    {
        $this->setOrderItemId($orderItemId);
    }
}
