<?php

namespace SellerCenter\SDK\Order\Contract;

use DateTime;
use GuzzleHttp\Command\ServiceClientInterface;
use SellerCenter\SDK\Order\OrderItems;
use SellerCenter\SDK\Order\Orders;

interface OrderInterface extends ServiceClientInterface
{
    /**
     * @param DateTime $createdAfter
     * @param DateTime $createdBefore
     * @param DateTime $updatedAfter
     * @param DateTime $updatedBefore
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Orders
     */
    public function getOrders(
        DateTime $createdAfter = null,
        DateTime $createdBefore = null,
        DateTime $updatedAfter = null,
        DateTime $updatedBefore = null,
        $limit = null,
        $offset = null
    );

    /**
     * @param int $orderId
     *
     * @return Orders
     */
    public function getOrder($orderId);

    /**
     * @param int $orderId
     *
     * @return OrderItems
     */
    public function getOrderItems($orderId);
}
