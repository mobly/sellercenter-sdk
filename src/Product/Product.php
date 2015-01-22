<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use LengthException;
use OverflowException;
use RuntimeException;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Product
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 * @JMS\XmlRoot("Product")
 */
class Product implements ToArrayInterface
{
    use SellerSkuTrait;

    use PriceTrait;

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
     * SellerSKU of a parent product – a variation to be attached to the product
     *
     * @var string
     * @JMS\SerializedName("ParentSku")
     * @JMS\Type("string")
     */
    protected $parentSku;

    /**
     * Can be one for the following values: 'enabled', 'disabled' or 'deleted', default is 'enabled'
     *
     * @var string
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    protected $status;

    /**
     * A string between 2 and 255 characters containing the product name
     *
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * A string that identi2es the variation e.g. “XXL”.
     *
     * @var string
     * @JMS\SerializedName("Variation")
     * @JMS\Type("string")
     */
    protected $variation;

    /**
     * Id of the main category of your product
     *
     * @var int
     * @JMS\SerializedName("PrimaryCategory")
     * @JMS\Type("integer")
     */
    protected $primaryCategory;

    /**
     * A comma separated list of 1 to 3 unique categories ids.
     *
     * @var string
     * @JMS\SerializedName("Categories")
     * @JMS\Type("string")
     */
    protected $categories;

    /**
     * A string between 6 and 25000 characters containing the product description. HTML tags are allowed
     *
     * @var string
     * @JMS\SerializedName("Description")
     * @JMS\Type("string")
     */
    protected $description;

    /**
     * A string containing the product brand
     *
     * @var string
     * @JMS\SerializedName("Brand")
     * @JMS\Type("string")
     */
    protected $brand;

    /**
     * Tax Class identi2cation string. Usually 'default'
     *
     * @var string
     * @JMS\SerializedName("TaxClass")
     * @JMS\Type("string")
     */
    protected $taxClass;

    /**
     * A string identifying shipping type; either 'crossdocking' or 'dropshipping'
     *
     * Only the allowed shipping types for the seller will be accepted
     *
     * @var string
     * @JMS\SerializedName("ShipmentType")
     * @JMS\Type("string")
     */
    protected $shipmentType;

    /**
     * EAN/UPC/ISBN of the product
     *
     * @var string
     * @JMS\SerializedName("ProductId")
     * @JMS\Type("string")
     */
    protected $productId;

    /**
     * An identification string of product condition: 'new', 'used' or 'refurbished'
     *
     * @var string
     * @JMS\SerializedName("Condition")
     * @JMS\Type("string")
     */
    protected $condition;

    /**
     * Section holding the variable number of additional product attributes
     *
     * Which attributes are available depends on the primary category.
     *
     * @var AttributeCollection
     * @JMS\SerializedName("array")
     * @JMS\Type("array")
     */
    protected $productData;

    /**
     * The available inventory for the product
     *
     * @var int
     * @JMS\SerializedName("Quantity")
     * @JMS\Type("string")
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
            throw new InvalidArgumentException('Brand name is not a valid string, ' . gettype($brand) . ' passed');
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
            throw new InvalidArgumentException(
                'Categories is not a valid string, ' . gettype($categories) . ' passed'
            );
        } elseif (strpos($categories, self::CATEGORIES_SEPARATOR) !== false) {
            $parsedCategories = explode(self::CATEGORIES_SEPARATOR, $categories);
            if (count($parsedCategories) > self::CATEGORIES_MAX_UNIQUE) {
                throw new OverflowException(
                    'Categories must be a comma separated list of 1 to '
                    . self::CATEGORIES_MAX_UNIQUE . ' unique categories ids'
                );
            } elseif (count(array_unique($parsedCategories)) < count($parsedCategories)) {
                throw new RuntimeException('Categories must be a comma separated list of unique categories ids');
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
            throw new InvalidArgumentException('Condition is not a valid string, ' . gettype($condition) . ' passed');
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
            throw new InvalidArgumentException(
                'Description is not a valid string, ' . gettype($description) . ' passed'
            );
        } elseif (strlen($description) < self::DESCRIPTION_MIN_LENGTH ||
            strlen($description) > self::DESCRIPTION_MAX_LENGTH
        ) {
            throw new LengthException(
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
            throw new InvalidArgumentException('Name is not a valid string, ' . gettype($name) . ' passed');
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
            throw new InvalidArgumentException('Parent SKU is not a valid string, ' . gettype($parentSku) . ' passed');
        }

        $this->parentSku = $parentSku;

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
            throw new InvalidArgumentException(
                'Primary category is not a valid integer, ' . gettype($primaryCategory) . ' passed'
            );
        }

        $this->primaryCategory = $primaryCategory;

        return $this;
    }

    /**
     * @return AttributeCollection
     */
    public function getProductData()
    {
        return $this->productData;
    }

    /**
     * @param AttributeCollection $productData
     *
     * @return Product
     */
    public function setProductData($productData)
    {
        if (!($productData instanceof AttributeCollection)) {
            throw new InvalidArgumentException(
                'Product data is not an instance of ProductAttributeCollection'
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
            throw new InvalidArgumentException('Product ID is not a valid string, ' . gettype($productId) . ' passed');
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
            throw new InvalidArgumentException(
                'Quantity is not a valid integer, ' . gettype($quantity) . ' passed'
            );
        }

        $this->quantity = $quantity;

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
            throw new InvalidArgumentException(
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
            throw new InvalidArgumentException(
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
            throw new InvalidArgumentException(
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
            throw new InvalidArgumentException('Argument is not a valid string, ' . gettype($variation) . ' passed');
        }

        $this->variation = $variation;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [
            'SellerSku' => $this->getSellerSku(),
        ];

        if (!empty($this->parentSku)) {
            $data['ParentSku'] = $this->getParentSku();
        }

        if (!empty($this->status)) {
            $data['Status'] = $this->getStatus();
        }

        if (!empty($this->name)) {
            $data['Name'] = $this->getName();
        }

        if (!empty($this->variation)) {
            $data['Variation'] = $this->getVariation();
        }

        if (!empty($this->primaryCategory)) {
            $data['PrimaryCategory'] = $this->getPrimaryCategory();
        }

        if (!empty($this->categories)) {
            $data['Categories'] = $this->getCategories();
        }

        if (!empty($this->description)) {
            $data['Description'] = $this->getDescription();
        }

        if (!empty($this->brand)) {
            $data['Brand'] = $this->getBrand();
        }

        if (!empty($this->price)) {
            $data['Price'] = $this->getPrice();
        }

        if (!empty($this->salePrice)) {
            $data['SalePrice'] = $this->getSalePrice();
        }

        if ($this->saleStartDate instanceof \DateTime) {
            $data['SaleFromDate'] = $this->getSaleStartDate()->format(\DateTime::ISO8601);
        }

        if ($this->saleEndDate instanceof \DateTime) {
            $data['SaleToDate'] = $this->getSaleEndDate()->format(\DateTime::ISO8601);
        }

        if (!empty($this->taxClass)) {
            $data['TaxClass'] = $this->getTaxClass();
        }

        if (!empty($this->shipmentType)) {
            $data['ShipmentType'] = $this->getShipmentType();
        }

        if (!empty($this->productId)) {
            $data['ProductId'] = $this->getProductId();
        }

        if (!empty($this->condition)) {
            $data['Condition'] = $this->getCondition();
        }

        if ($this->productData instanceof AttributeCollection) {
            $data['ProductData'] = $this->getProductData()->toArray();
        }

        if (!empty($this->quantity)) {
            $data['Quantity'] = $this->getQuantity();
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function toXmlArray()
    {
        $data = $this->toArray();

        if ($this->productData instanceof AttributeCollection) {
            $data['ProductData'] = $this->getProductData()->toXmlArray();
        }

        return ['Product' => $data];
    }
}
