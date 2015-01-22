<?php

namespace SellerCenter\SDK\Order;

use DateTime;
use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Order\Contract\OrderInterface;
use SellerCenter\SDK\Order\Contract\RetrieveInterface;

/**
 * Class StatusClient
 *
 * @package SellerCenter\SDK\Status
 * @author  Daniel Costa
 */
class OrderClient extends SdkClient implements RetrieveInterface, OrderInterface
{
    /**
     * @var string
     */
    protected $action = 'Order';

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
    ) {
        $data = [];
        if (!empty($createdAfter)) {
            $data['CreatedAfter'] = $createdAfter->format(DATE_ISO8601);
        }
        if (!empty($createdBefore)) {
            $data['CreatedBefore'] = $createdBefore->format(DATE_ISO8601);
        }
        if (!empty($updatedAfter)) {
            $data['UpdatedAfter'] = $updatedAfter->format(DATE_ISO8601);
        }
        if (!empty($updatedBefore)) {
            $data['UpdatedBefore'] = $updatedBefore->format(DATE_ISO8601);
        }
        if (!empty($limit)) {
            $data['Limit'] = (int) $limit;
        }
        if (!empty($offset)) {
            $data['Offset'] = (int) $offset;
        }

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param int $orderId
     *
     * @return Orders
     */
    public function getOrder($orderId)
    {
        $data = [
            'OrderId' => $orderId
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param int $orderId
     *
     * @return OrderItems
     */
    public function getOrderItems($orderId)
    {
        $data = [
            'OrderId' => $orderId
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @return FailureReason
     */
    public function getFailureReasons()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    /**
     * @return ShipmentProviders
     */
    public function getShipmentProviders()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }
}
