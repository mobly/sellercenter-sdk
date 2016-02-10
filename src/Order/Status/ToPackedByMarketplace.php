<?php namespace SellerCenter\SDK\Order\Status;

use SellerCenter\SDK\Order\Enum\DeliveryTypeEnum;

class ToPackedByMarketplace
{
    /** @var array */
    protected $orderItemIds;

    /** @var DeliveryTypeEnum */
    protected $deliveryType;

    /** @var string */
    protected $shippingProvider;

    public function __construct(
        array $orderItemIds,
        DeliveryTypeEnum $deliveryType,
        $shippingProvider = null
    ) {
        $this->orderItemIds = $orderItemIds;
        $this->deliveryType = $deliveryType;

        if ($deliveryType->getValue() == DeliveryTypeEnum::DROPSHIP()) {
            if (empty($shippingProvider)) {
                throw new \InvalidArgumentException(
                    'Shipping Provider must be filled for delivery type dropship'
                );
            }

            $this->shippingProvider = (string) $shippingProvider;
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
     * @return ToPackedByMarketplace
     */
    public function setOrderItemIds(array $orderItemIds)
    {
        $this->orderItemIds = $orderItemIds;

        return $this;
    }

    /**
     * @return DeliveryTypeEnum
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @param DeliveryTypeEnum $deliveryType
     *
     * @return ToPackedByMarketplace
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
     * @return ToPackedByMarketplace
     */
    public function setShippingProvider($shippingProvider)
    {
        $this->shippingProvider = $shippingProvider;

        return $this;
    }
}
