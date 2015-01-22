<?php

namespace SellerCenter\SDK\Order\Status;

use SellerCenter\SDK\Order\Enum\DeliveryTypeEnum;

class ToReadyToShip
{
    /** @var array */
    protected $orderItemIds;

    /** @var string */
    protected $deliveryType;

    /** @var string */
    protected $shippingProvider;

    /** @var string */
    protected $trackingNumber;

    public function __construct(
        array $orderItemIds,
        DeliveryTypeEnum $deliveryType,
        $shippingProvider = null,
        $trackingNumber = null
    ) {
        $this->orderItemIds = $orderItemIds;
        $this->deliveryType = $deliveryType;
        if (DeliveryTypeEnum::DROPSHIP == $deliveryType->getValue()) {
            $this->shippingProvider = (string) $shippingProvider;
            $this->trackingNumber = (string) $trackingNumber;
        }
    }

    /**
     * @return array
     */
    public function getOrderItemIds()
    {
        return $this->orderItemIds;
    }

    /**
     * @param array $orderItemIds
     *
     * @return ToReadyToShip
     */
    public function setOrderItemIds($orderItemIds)
    {
        $this->orderItemIds = $orderItemIds;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @param string $deliveryType
     *
     * @return ToReadyToShip
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingProvider()
    {
        return $this->shippingProvider;
    }

    /**
     * @param string $shippingProvider
     *
     * @return ToReadyToShip
     */
    public function setShippingProvider($shippingProvider)
    {
        $this->shippingProvider = $shippingProvider;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @param string $trackingNumber
     *
     * @return ToReadyToShip
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }
}
