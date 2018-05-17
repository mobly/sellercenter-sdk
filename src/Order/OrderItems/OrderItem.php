<?php namespace SellerCenter\SDK\Order\OrderItems;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderItem
 *
 * @package SellerCenter\SDK\Order\OrderItems
 */
class OrderItem
{
    /**
     * @var int
     * @JMS\SerializedName("OrderItemId")
     * @JMS\Type("integer")
     */
    protected $orderItemId;

    /**
     * @var int
     * @JMS\SerializedName("OrderId")
     * @JMS\Type("integer")
     */
    protected $orderId;

    /**
     * @var int
     * @JMS\SerializedName("ShopId")
     * @JMS\Type("integer")
     */
    protected $shopId;

    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    protected $Name;

    /**
     * @var string
     * @JMS\SerializedName("Sku")
     * @JMS\Type("string")
     */
    protected $sku;

    /**
     * @var string
     * @JMS\SerializedName("ShopSku")
     * @JMS\Type("string")
     */
    protected $shopSku;

    /**
     * @var string
     * @JMS\SerializedName("ShippingType")
     * @JMS\Type("string")
     */
    protected $shippingType;

    /**
     * @var float
     * @JMS\SerializedName("ItemPrice")
     * @JMS\Type("double")
     */
    protected $itemPrice;

    /**
     * @var float
     * @JMS\SerializedName("PaidPrice")
     * @JMS\Type("double")
     */
    protected $paidPrice;

    /**
     * @var float
     * @JMS\SerializedName("TaxAmount")
     * @JMS\Type("double")
     */
    protected $taxAmount;

    /**
     * @var float
     * @JMS\SerializedName("ShippingAmount")
     * @JMS\Type("float")
     */
    protected $shippingAmount;

    /**
     * @var float
     * @JMS\SerializedName("VoucherAmount")
     * @JMS\Type("double")
     */
    protected $voucherAmount;

    /**
     * @var string
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    protected $status;

    /**
     * @var string
     * @JMS\SerializedName("ShipmentProvider")
     * @JMS\Type("string")
     */
    protected $shipmentProvider;

    /**
     * @var string
     * @JMS\SerializedName("Reason")
     * @JMS\Type("string")
     */
    protected $reason;

    /**
     * @var string
     * @JMS\SerializedName("ReasonDetail")
     * @JMS\Type("string")
     */
    protected $reasonDetail;

    /**
     * @var string
     * @JMS\SerializedName("PurchaseOrderId")
     * @JMS\Type("string")
     */
    protected $purchaseOrderId;

    /**
     * @var string
     * @JMS\SerializedName("PurchaseOrderNumber")
     * @JMS\Type("string")
     */
    protected $purchaseOrderNumber;

    /**
     * @var string
     * @JMS\SerializedName("PackageId")
     * @JMS\Type("string")
     */
    protected $packageId;

    /**
     * @var DateTime
     * @JMS\SerializedName("CreatedAt")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $createdAt;

    /**
     * @var DateTime
     * @JMS\SerializedName("UpdatedAt")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $updatedAt;

    public function getShopId()
    {
        return $this->shopId;
    }

    public function getOrderItemId()
    {
        return $this->orderItemId;
    }

    public function getSku()
    {
        return $this->sku;
    }
}
