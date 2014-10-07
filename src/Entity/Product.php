<?php

namespace SellerCenter\SDK\Entity;

use SellerCenter\SDK\Collection\ProductAttributeCollection;

/**
 * Class Product
 *
 * @package Mobly\SellerCenterSDK
 * @author  Daniel Costa
 */
class Product
{
    /**
     * @type string
     */
    const CATEGORIES_SEPARATOR = ',';

    /**
     * @type int
     */
    const CATEGORIES_MAX_UNIQUE = 3;

    /**
     * @type int
     */
    const DESCRIPTION_MAX_LENGTH = 25000;

    /**
     * @type int
     */
    const DESCRIPTION_MIN_LENGTH = 6;

    /**
     * @var string
     */
    protected $sellerSku;

    /**
     * @var string
     */
    protected $parentSku;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $variation;

    /**
     * @var int
     */
    protected $primaryCategory;

    /**
     * @var string
     */
    protected $categories;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $salePrice;

    /**
     * @var \DateTime
     */
    protected $saleStartDate;

    /**
     * @var \DateTime
     */
    protected $saleEndDate;

    /**
     * @var string
     */
    protected $taxClass;

    /**
     * @var string
     */
    protected $shipmentType;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $condition;

    /**
     * @var ProductAttributeCollection
     */
    protected $productData;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     *
     * @return Product
     */
    public function setBrand($brand)
    {
        if (!is_string($brand)) {
            throw new \InvalidArgumentException('Brand name is not a valid string, ' . gettype($brand) . ' passed');
        }

        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string $categories
     *
     * @return Product
     */
    public function setCategories($categories)
    {
        if (!is_string($categories)) {
            throw new \InvalidArgumentException(
                'Categories is not a valid string, ' . gettype($categories) . ' passed'
            );
        } elseif (strpos($categories, self::CATEGORIES_SEPARATOR) !== false) {
            $parsedCategories = explode(self::CATEGORIES_SEPARATOR, $categories);
            if (count($parsedCategories) > self::CATEGORIES_MAX_UNIQUE) {
                throw new \OverflowException(
                    'Categories must be a comma separated list of 1 to '
                    . self::CATEGORIES_MAX_UNIQUE . ' unique categories ids'
                );
            } elseif (count(array_unique($parsedCategories)) < count($parsedCategories)) {
                throw new \RuntimeException('Categories must be a comma separated list of unique categories ids');
            }
        }

        $this->categories = $categories;

        return $this;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     *
     * @return Product
     */
    public function setCondition($condition)
    {
        if (!is_string($condition)) {
            throw new \InvalidArgumentException('Condition is not a valid string, ' . gettype($condition) . ' passed');
        }

        $this->condition = $condition;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        if (!is_string($description)) {
            throw new \InvalidArgumentException(
                'Description is not a valid string, ' . gettype($description) . ' passed'
            );
        } elseif (strlen($description) < self::DESCRIPTION_MIN_LENGTH ||
            strlen($description) > self::DESCRIPTION_MAX_LENGTH
        ) {
            throw new \LengthException(
                'Description should be a string between '
                . self::DESCRIPTION_MIN_LENGTH . ' and ' . self::DESCRIPTION_MAX_LENGTH . ' chars'
            );
        }

        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException('Name is not a valid string, ' . gettype($name) . ' passed');
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getParentSku()
    {
        return $this->parentSku;
    }

    /**
     * @param string $parentSku
     *
     * @return Product
     */
    public function setParentSku($parentSku)
    {
        if (!is_string($parentSku)) {
            throw new \InvalidArgumentException('Parent SKU is not a valid string, ' . gettype($parentSku) . ' passed');
        }

        $this->parentSku = $parentSku;

        return $this;
    }

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
            throw new \InvalidArgumentException(
                'Price is not a valid float, ' . gettype($price) . ' passed'
            );
        }

        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrimaryCategory()
    {
        return $this->primaryCategory;
    }

    /**
     * @param int $primaryCategory
     *
     * @return Product
     */
    public function setPrimaryCategory($primaryCategory)
    {
        if (!is_int($primaryCategory)) {
            throw new \InvalidArgumentException(
                'Primary category is not a valid integer, ' . gettype($primaryCategory) . ' passed'
            );
        }

        $this->primaryCategory = $primaryCategory;

        return $this;
    }

    /**
     * @return ProductAttributeCollection
     */
    public function getProductData()
    {
        return $this->productData;
    }

    /**
     * @param ProductAttributeCollection $productData
     *
     * @return Product
     */
    public function setProductData($productData)
    {
        if (!($productData instanceof ProductAttributeCollection)) {
            throw new \InvalidArgumentException(
                'Product data is not a valid instance of ProductAttributeCollection, ' . gettype(
                    $productData
                ) . ' passed'
            );
        }

        $this->productData = $productData;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     *
     * @return Product
     */
    public function setProductId($productId)
    {
        if (!is_string($productId)) {
            throw new \InvalidArgumentException('Product ID is not a valid string, ' . gettype($productId) . ' passed');
        }

        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        if (!is_int($quantity)) {
            throw new \InvalidArgumentException(
                'Quantity is not a valid integer, ' . gettype($quantity) . ' passed'
            );
        }

        $this->quantity = $quantity;

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
        if (!($saleEndDate instanceof \DateTime)) {
            throw new \InvalidArgumentException(
                'Sale end date is not a instance of DateTime, ' . gettype($saleEndDate) . ' passed'
            );
        }

        $this->saleEndDate = $saleEndDate;

        return $this;
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
            throw new \InvalidArgumentException(
                'Sale price is not a valid float, ' . gettype($salePrice) . ' passed'
            );
        }


        $this->salePrice = $salePrice;

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
        if (!($saleStartDate instanceof \DateTime)) {
            throw new \InvalidArgumentException(
                'Sale start date is not a instance of DateTime, ' . gettype($saleStartDate) . ' passed'
            );
        }

        $this->saleStartDate = $saleStartDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSellerSku()
    {
        return $this->sellerSku;
    }

    /**
     * @param string $sellerSku
     *
     * @return Product
     */
    public function setSellerSku($sellerSku)
    {
        if (!is_string($sellerSku)) {
            throw new \InvalidArgumentException('Seller SKU is not a valid string, ' . gettype($sellerSku) . ' passed');
        }

        $this->sellerSku = $sellerSku;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipmentType()
    {
        return $this->shipmentType;
    }

    /**
     * @param string $shipmentType
     *
     * @return Product
     */
    public function setShipmentType($shipmentType)
    {
        if (!is_string($shipmentType)) {
            throw new \InvalidArgumentException(
                'Shipment type is not a valid string, ' . gettype($shipmentType) . ' passed'
            );
        }

        $this->shipmentType = $shipmentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Product
     */
    public function setStatus($status)
    {
        if (!is_string($status)) {
            throw new \InvalidArgumentException(
                'Status is not a valid string, ' . gettype($status) . ' passed'
            );
        }

        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxClass()
    {
        return $this->taxClass;
    }

    /**
     * @param string $taxClass
     *
     * @return Product
     */
    public function setTaxClass($taxClass)
    {
        if (!is_string($taxClass)) {
            throw new \InvalidArgumentException(
                'Tax class is not a valid string, ' . gettype($taxClass) . ' passed'
            );
        }

        $this->taxClass = $taxClass;

        return $this;
    }

    /**
     * @return string
     */
    public function getVariation()
    {
        return $this->variation;
    }

    /**
     * @param string $variation
     *
     * @return Product
     */
    public function setVariation($variation)
    {
        if (!is_string($variation)) {
            throw new \InvalidArgumentException('Argument is not a valid string, ' . gettype($variation) . ' passed');
        }

        $this->variation = $variation;

        return $this;
    }
}
