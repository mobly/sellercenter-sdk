<?php namespace SellerCenter\SDK\Order;

use DateTime;
use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Order\Contract\OrderInterface;
use SellerCenter\SDK\Order\Contract\RetrieveInterface;
use SellerCenter\SDK\Order\Contract\StatusInterface;
use SellerCenter\SDK\Order\Status\ToCancel;
use SellerCenter\SDK\Order\Status\ToDelivered;
use SellerCenter\SDK\Order\Status\ToFailedDelivery;
use SellerCenter\SDK\Order\Status\ToReadyToShip;
use SellerCenter\SDK\Order\Status\ToShipped;
use SellerCenter\SDK\ShipmentProvider\ShipmentProviderCollection;

/**
 * Class StatusClient
 *
 * @package SellerCenter\SDK\Status
 * @author  Daniel Costa
 * @codeCoverageIgnore
 */
class OrderClient extends SdkClient implements RetrieveInterface, OrderInterface, StatusInterface
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
     * @return ShipmentProviderCollection
     */
    public function getShipmentProviders()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    /**
     * @param ToCancel $order
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function setStatusToCanceled(ToCancel $order)
    {
        $data = [
            'OrderItemId' => $order->getOrderItemId(),
            'Reason' => $order->getReason(),
            'ReasonDetail' => $order->getReasonDetail(),
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ToReadyToShip $order
     *
     * @return \SellerCenter\SDK\Order\StatusToReadyToShip
     */
    public function setStatusToReadyToShip(ToReadyToShip $order)
    {
        $data = [
            'OrderItemIds' => json_encode($order->getOrderItemIds()),
            'DeliveryType' => $order->getDeliveryType()->getValue(),
            'ShippingProvider' => $order->getShippingProvider(),
            'TrackingNumber' => $order->getTrackingNumber(),
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ToShipped $order
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function setStatusToShipped(ToShipped $order)
    {
        $data = [
            'OrderItemId' => $order->getOrderItemId(),
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ToFailedDelivery $order
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function setStatusToFailedDelivery(ToFailedDelivery $order)
    {
        $data = [
            'OrderItemId' => $order->getOrderItemId(),
            'Reason' => $order->getReason(),
            'ReasonDetail' => $order->getReasonDetail(),
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ToDelivered $order
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function setStatusToDelivered(ToDelivered $order)
    {
        $data = [
            'OrderItemId' => $order->getOrderItemId(),
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }
}
