<?php namespace SellerCenter\SDK\Product;

use DateTime;
use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Product\Contract\ProductInterface;
use SellerCenter\SDK\Product\Enum\ProductFilterEnum;

/**
 * Class ProductClient
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 * @codeCoverageIgnore
 */
class ProductClient extends SdkClient implements ProductInterface
{
    /**
     * @var string
     */
    protected $action = 'Product';

    /**
     * Create a new product
     *
     * @param null                   $search
     * @param null|ProductFilterEnum $filter
     * @param DateTime|null          $createdAt
     * @param DateTime|null          $createdBefore
     * @param null                   $limit
     * @param null                   $offset
     * @param array                  $skuSeller
     *
     * @return \SellerCenter\SDK\Product\Api\GetProducts\Response
     */
    public function getProducts(
        $search = null,
        Enum\ProductFilterEnum $filter = null,
        \DateTime $createdAt = null,
        \DateTime $createdBefore = null,
        $limit = null,
        $offset = null,
        array $skuSeller = []
    ) {
        $data = [];
        if (!empty($createdAt)) {
            $data['CreatedAfter'] = $createdAt->format(DATE_ISO8601);
        }
        if (!empty($createdBefore)) {
            $data['CreatedBefore'] = $createdBefore->format(DATE_ISO8601);
        }
        if (!empty($search)) {
            $data['Search'] = $search;
        }
        if (!empty($filter)) {
            $data['Filter'] = $filter->getValue();
        }
        if (!empty($limit) && is_int($limit) && $limit > 0) {
            $data['Limit'] = $limit;
        }
        if (!empty($offset) && is_int($offset) && $offset > -1) {
            $data['Offset'] = $offset;
        }
        if (!empty($skuSeller)) {
            $data['SkuSellerList'] = json_encode($skuSeller);
        }

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productCreate(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Update the attributes of one or more existing products
     *
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productUpdate(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Removes one or more products
     *
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productRemove(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Set the Images for a Product, by associating one or more URLs with it
     *
     * It is the caller's responsibility to host the images.
     * The first image passed in becomes the product's default image.
     * Upon calling this endpoint, all previously associated images are disassociated.
     * There is a hard limit of at most 8 images per product.
     *
     * @param ProductImageCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function image(ProductImageCollection $collection)
    {
        $data = [
            'ProductImageRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Get all or a range of product brands
     *
     * @return \SellerCenter\SDK\Product\Api\GetBrands\Response
     */
    public function getBrands()
    {
        $data = [];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Get the list of all product categories
     *
     * @return \SellerCenter\SDK\Product\Api\GetCategoryTree\Response
     */
    public function getCategoryTree()
    {
        $data = [];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Returns a list of attributes with options for a given category
     * It will also display attributes for TaxClass and ShipmentType, with their possible values listed as options
     *
     * @param int $category Identifier of the category for which the caller wants the list of attributes
     *
     * @return \SellerCenter\SDK\Product\Api\GetCategoryAttributes\AttributeCollection
     */
    public function getCategoryAttributes($category)
    {
        $data = [
            'PrimaryCategory' => $category
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param int $attributeSet Id of the AttributeSet(s)
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function getCategoriesByAttributeSet($attributeSet)
    {
        $data = [
            'AttributeSet' => $attributeSet
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }
}
