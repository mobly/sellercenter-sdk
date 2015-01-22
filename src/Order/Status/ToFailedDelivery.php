<?php

namespace SellerCenter\SDK\Order\Status;

use SellerCenter\SDK\Order\OrderItemIdTrait;
use SellerCenter\SDK\Order\ReasonTrait;

class ToFailedDelivery
{
    use OrderItemIdTrait;

    use ReasonTrait;

    /**
     * @param int         $orderItemId
     * @param string      $reason
     * @param string|null $reasonDetail
     */
    public function __construct($orderItemId, $reason, $reasonDetail = null)
    {
        $this->setOrderItemId($orderItemId);
        $this->setReason($reason);
        $this->setReasonDetail($reasonDetail);
    }
}
