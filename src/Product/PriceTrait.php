<?php namespace SellerCenter\SDK\Product;

use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;

/**
 * Price Trait
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
trait PriceTrait
{
    /**
     * An optional number with the price of the product
     *
     * @var float
     * @JMS\SerializedName("Price")
     * @JMS\Type("double")
     * @JMS\AccessType("public_method")
     */
    protected $price;

    /**
     * A special sale price
     *
     * @var float
     * @JMS\SerializedName("SalePrice")
     * @JMS\Type("double")
     * @JMS\AccessType("public_method")
     */
    protected $salePrice;

    /**
     * Starting date for the sale
     *
     * @var \DateTime
     * @JMS\SerializedName("SaleStartDate")
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getSaleStartDateString")
     */
    protected $saleStartDate;

    /**
     * Ending date for the sale
     *
     * @var \DateTime
     * @JMS\SerializedName("SaleEndDate")
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getSaleEndDateString")
     */
    protected $saleEndDate;

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        if (!is_float($price)) {
            throw new InvalidArgumentException(
                'Price is not a valid float, ' . gettype($price) . ' passed'
            );
        }

        if ($price) {
            $this->price = $price;
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSaleEndDate()
    {
        return $this->saleEndDate;
    }

    /**
     * @param \DateTime $saleEndDate
     *
     * @return Product
     */
    public function setSaleEndDate($saleEndDate)
    {
        return $this->setDate('saleEndDate', $saleEndDate);
    }

    /**
     * @return float
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @param float $salePrice
     *
     * @return Product
     */
    public function setSalePrice($salePrice)
    {
        if (!is_float($salePrice)) {
            throw new InvalidArgumentException(
                'Sale price is not a valid float, ' . gettype($salePrice) . ' passed'
            );
        }

        if ($salePrice) {
            $this->salePrice = $salePrice;
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSaleStartDate()
    {
        return $this->saleStartDate;
    }

    /**
     * @param \DateTime $saleStartDate
     *
     * @return Product
     */
    public function setSaleStartDate($saleStartDate)
    {
        return $this->setDate('saleStartDate', $saleStartDate);
    }

    /**
     * @return string
     */
    public function getSaleStartDateString()
    {
        return $this->getSaleStartDate()->format('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getSaleEndDateString()
    {
        return $this->getSaleEndDate()->format('Y-m-d H:i:s');
    }

    /**
     * @param $property
     * @param $value
     *
     * @return $this
     */
    private function setDate($property, $value)
    {
        if (empty($value)) {
            return $this;
        }

        if (!$value instanceof \DateTime) {
            if (\DateTime::createFromFormat('Y-m-d H:i:s', $value) instanceof \DateTime) {
                $value = \DateTime::createFromFormat('Y-m-d H:i:s', $value);
            } elseif (\DateTime::createFromFormat(DATE_ISO8601, $value) instanceof \DateTime) {
                $value = \DateTime::createFromFormat(DATE_ISO8601, $value);
            }
        }

        if (!$value instanceof \DateTime) {
            throw new InvalidArgumentException('Property "' . $property . '"" is not an instance of DateTime');
        }

        $this->$property = $value;

        return $this;
    }
}
