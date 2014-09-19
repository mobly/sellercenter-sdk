<?php

namespace Mobly\SellerCenter\Entity;

use Mobly\SellerCenter\Collection\ProductAttributeCollection;

/**
 * Class Product
 *
 * @package Mobly\SellerCenter
 * @author  Daniel Costa
 */
class Product
{

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
        $this->variation = $variation;

        return $this;
    }
}
