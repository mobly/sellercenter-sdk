<?php namespace SellerCenter\SDK\Product;

use GuzzleHttp\Command\ToArrayInterface;
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
 * @JMS\AccessorOrder("custom", custom = {"SellerSku", "Name"})
 */
class Product extends AbstractProduct implements ToArrayInterface
{
    use ShopSkuTrait;

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
     * SellerSKU of a parent product – another product, which the current product will be associated with
     *
     * @var string
     * @JMS\SerializedName("ParentSku")
     * @JMS\Type("string")
     */
    protected $parentSku;

    /**
     * One of the following values: 'active', 'inactive' or 'deleted'. Default is 'active'
     *
     * @var Enum\StatusEnum
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    protected $status;

    /**
     * Product's name, 2 to 255 characters
     *
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * Identifier for the variation (e.g. “XXL”)
     *
     * @var string
     * @JMS\SerializedName("Variation")
     * @JMS\Type("string")
     */
    protected $variation;

    /**
     * Identification of the main category of the product
     *
     * @var int
     * @JMS\SerializedName("PrimaryCategory")
     * @JMS\Type("integer")
     */
    protected $primaryCategory;

    /**
     * A list of 1 to 3 unique categories identifications (separated with ',') to which the product belongs
     *
     * @var string
     * @JMS\SerializedName("Categories")
     * @JMS\Type("string")
     */
    protected $categories;

    /**
     * A list of 1 to 2 unique category identifications (separated with ',')
     *
     * @var string
     * @JMS\SerializedName("BrowseNodes")
     * @JMS\Type("string")
     */
    protected $browseNodes;

    /**
     * A text of 6 to 25000 characters describing the product. HTML tags are allowed.
     *
     * @var string
     * @JMS\SerializedName("Description")
     * @JMS\Type("string")
     */
    protected $description;

    /**
     * The product's brand
     *
     * @var string
     * @JMS\SerializedName("Brand")
     * @JMS\Type("string")
     */
    protected $brand;

    /**
     * Tax classification. Usually 'default'
     *
     * @var Enum\TaxClassEnum
     * @JMS\SerializedName("TaxClass")
     * @JMS\Type("string")
     */
    protected $taxClass;

    /**
     * A string identifying shipping type, either 'crossdocking' or 'dropshipping'.
     *
     * Only the allowed shipping types for the seller will be accepted.
     *
     * @var Enum\ShipmentTypeEnum
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
     * @JMS\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId;

    /**
     * Product's condition: 'new', 'used' or 'refurbished'
     *
     * @var Enum\ConditionEnum
     * @JMS\SerializedName("Condition")
     * @JMS\Type("string")
     */
    protected $condition;

    /**
     * Additional product attributes, depends on the primary category.
     *
     * @var AttributeCollection
     * @JMS\SerializedName("ProductData")
     * @JMS\Type("array")
     * @JMS\Accessor(getter="getProductDataArray")
     * @JMS\XmlKeyValuePairs
     */
    protected $productData;

    /**
     * The available inventory
     *
     * @var int
     * @JMS\SerializedName("Quantity")
     * @JMS\Type("string")
     */
    protected $quantity;

    public function __construct()
    {
        $this->productData = new AttributeCollection;
    }

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
     * @return Enum\ConditionEnum
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param Enum\ConditionEnum $condition
     *
     * @return Product
     */
    public function setCondition(Enum\ConditionEnum $condition)
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
    public function setProductData(AttributeCollection $productData)
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
        if (!is_string($productId)) {
            throw new InvalidArgumentException('Product ID is not a valid string, ' . gettype($productId) . ' passed');
        }

        if (!empty($productId)) {
            $this->productId = $productId;
        }

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
     * @return Enum\ShipmentTypeEnum
     */
    public function getShipmentType()
    {
        return $this->shipmentType;
    }

    /**
     * @param Enum\ShipmentTypeEnum $shipmentType
     *
     * @return Product
     */
    public function setShipmentType(Enum\ShipmentTypeEnum $shipmentType)
    {
        $this->shipmentType = $shipmentType;

        return $this;
    }

    /**
     * @return Enum\StatusEnum
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Enum\StatusEnum $status
     *
     * @return Product
     */
    public function setStatus(Enum\StatusEnum $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Enum\TaxClassEnum
     */
    public function getTaxClass()
    {
        return $this->taxClass;
    }

    /**
     * @param Enum\TaxClassEnum $taxClass
     *
     * @return Product
     */
    public function setTaxClass(Enum\TaxClassEnum $taxClass)
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
        if (!is_string($variation)) {
            throw new InvalidArgumentException('Argument is not a valid string, ' . gettype($variation) . ' passed');
        }

        $this->variation = $variation;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrowseNodes()
    {
        return $this->browseNodes;
    }

    /**
     * @param string $browseNodes
     *
     * @return Product
     */
    public function setBrowseNodes($browseNodes)
    {
        $this->browseNodes = $browseNodes;

        return $this;
    }

    /**
     * @return array
     */
    public function getProductDataArray()
    {
        if ($this->productData instanceof AttributeCollection) {
            return $this->getProductData()->toArray();
        }

        // @codeCoverageIgnoreStart
        return [];
        // @codeCoverageIgnoreEnd
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [
            'SellerSku' => $this->getSellerSku(),
            'SalePrice' => '',
        ];

        if (!empty($this->parentSku)) {
            $data['ParentSku'] = $this->getParentSku();
        }

        if (!empty($this->shopSku)) {
            $data['ShopSku'] = $this->getShopSku();
        }

        if (!empty($this->status)) {
            $data['Status'] = (string) $this->getStatus();
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

        if (!empty($this->browseNodes)) {
            $data['BrowseNodes'] = $this->getBrowseNodes();
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
            $data['SaleStartDate'] = $this->getSaleStartDate()->format(\DateTime::ISO8601);
        }

        if ($this->saleEndDate instanceof \DateTime) {
            $data['SaleEndDate'] = $this->getSaleEndDate()->format(\DateTime::ISO8601);
        }

        if (!empty($this->taxClass)) {
            $data['TaxClass'] = (string) $this->getTaxClass();
        }

        if (!empty($this->shipmentType)) {
            $data['ShipmentType'] = (string) $this->getShipmentType();
        }

        if (!empty($this->productId)) {
            $data['ProductId'] = $this->getProductId();
        }

        if (!empty($this->condition)) {
            $data['Condition'] = (string) $this->getCondition();
        }

        if ($this->productData instanceof AttributeCollection && count($this->productData)) {
            $data['ProductData'] = $this->getProductData()->toArray();
        }

        if (!empty($this->quantity)) {
            $data['Quantity'] = $this->getQuantity();
        }

        return $data;
    }
}
