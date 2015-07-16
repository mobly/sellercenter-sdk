<?php namespace SellerCenter\SDK\Order\Orders;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Reason
 *
 * @package SellerCenter\SDK\Order\Orders
 * @author Daniel Costa
 */
class Order
{
    /**
     * @var string
     * @JMS\SerializedName("OrderId")
     * @JMS\Type("string")
     */
    protected $orderId;

    /**
     * @var string
     * @JMS\SerializedName("CustomerFirstName")
     * @JMS\Type("string")
     */
    protected $customerFirstName;

    /**
     * @var string
     * @JMS\SerializedName("CustomerLastName")
     * @JMS\Type("string")
     */
    protected $customerLastName;

    /**
     * @var string
     * @JMS\SerializedName("OrderNumber")
     * @JMS\Type("string")
     */
    protected $orderNumber;

    /**
     * @var string
     * @JMS\SerializedName("PaymentMethod")
     * @JMS\Type("string")
     */
    protected $paymentMethod;

    /**
     * @var string
     * @JMS\SerializedName("Remarks")
     * @JMS\Type("string")
     */
    protected $remarks;

    /**
     * @var string
     * @JMS\SerializedName("DeliveryInfo")
     * @JMS\Type("string")
     */
    protected $deliveryInfo;

    /**
     * @var string
     * @JMS\SerializedName("GiftOption")
     * @JMS\Type("string")
     */
    protected $giftOption;

    /**
     * @var string
     * @JMS\SerializedName("GiftMessage")
     * @JMS\Type("string")
     */
    protected $giftMessage;

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

    /**
     * @var Address
     * @JMS\SerializedName("AddressBilling")
     * @JMS\Type("SellerCenter\SDK\Order\Orders\Address")
     */
    protected $addressBilling;

    /**
     * @var Address
     * @JMS\SerializedName("AddressShipping")
     * @JMS\Type("SellerCenter\SDK\Order\Orders\Address")
     */
    protected $addressShipping;

    /**
     * @var string
     * @JMS\SerializedName("NationalRegistrationNumber")
     * @JMS\Type("string")
     */
    protected $nationalRegistrationNumber;

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     *
     * @return Order
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerFirstName()
    {
        return $this->customerFirstName;
    }

    /**
     * @param string $customerFirstName
     *
     * @return Order
     */
    public function setCustomerFirstName($customerFirstName)
    {
        $this->customerFirstName = $customerFirstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerLastName()
    {
        return $this->customerLastName;
    }

    /**
     * @param string $customerLastName
     *
     * @return Order
     */
    public function setCustomerLastName($customerLastName)
    {
        $this->customerLastName = $customerLastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     *
     * @return Order
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     *
     * @return Order
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param string $remarks
     *
     * @return Order
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryInfo()
    {
        return $this->deliveryInfo;
    }

    /**
     * @param string $deliveryInfo
     *
     * @return Order
     */
    public function setDeliveryInfo($deliveryInfo)
    {
        $this->deliveryInfo = $deliveryInfo;

        return $this;
    }

    /**
     * @return string
     */
    public function getGiftOption()
    {
        return $this->giftOption;
    }

    /**
     * @param string $giftOption
     *
     * @return Order
     */
    public function setGiftOption($giftOption)
    {
        $this->giftOption = $giftOption;

        return $this;
    }

    /**
     * @return string
     */
    public function getGiftMessage()
    {
        return $this->giftMessage;
    }

    /**
     * @param string $giftMessage
     *
     * @return Order
     */
    public function setGiftMessage($giftMessage)
    {
        $this->giftMessage = $giftMessage;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     *
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     *
     * @return Order
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddressBilling()
    {
        return $this->addressBilling;
    }

    /**
     * @param Address $addressBilling
     *
     * @return Order
     */
    public function setAddressBilling($addressBilling)
    {
        $this->addressBilling = $addressBilling;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddressShipping()
    {
        return $this->addressShipping;
    }

    /**
     * @param Address $addressShipping
     *
     * @return Order
     */
    public function setAddressShipping($addressShipping)
    {
        $this->addressShipping = $addressShipping;

        return $this;
    }

    /**
     * @return string
     */
    public function getNationalRegistrationNumber()
    {
        return $this->nationalRegistrationNumber;
    }

    /**
     * @param string $nationalRegistrationNumber
     *
     * @return Order
     */
    public function setNationalRegistrationNumber($nationalRegistrationNumber)
    {
        $this->nationalRegistrationNumber = $nationalRegistrationNumber;

        return $this;
    }
}
