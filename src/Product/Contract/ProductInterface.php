<?php namespace SellerCenter\SDK\Product\Contract;

use DateTime;
use GuzzleHttp\Command\ServiceClientInterface;
use SellerCenter\SDK\Product\Enum\ProductFilterEnum;
use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\SDK\Product\ProductImageCollection;

/**
 * Product Interface
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
interface ProductInterface extends ServiceClientInterface
{
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
        ProductFilterEnum $filter = null,
        DateTime $createdAt = null,
        DateTime $createdBefore = null,
        $limit = null,
        $offset = null,
        array $skuSeller = []
    );

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productCreate(ProductCollection $collection);

    /**
     * Update the attributes of one or more existing products
     *
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productUpdate(ProductCollection $collection);

    /**
     * Removes one or more products
     *
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productRemove(ProductCollection $collection);

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
    public function image(ProductImageCollection $collection);

    /**
     * Get all or a range of product brands
     *
     * @return \SellerCenter\SDK\Product\Api\GetBrands\Response
     */
    public function getBrands();

    /**
     * Get the list of all product categories
     *
     * @return \SellerCenter\SDK\Product\Api\GetCategoryTree\Response
     */
    public function getCategoryTree();

    /**
     * Returns a list of attributes with options for a given category
     * It will also display attributes for TaxClass and ShipmentType, with their possible values listed as options
     *
     * @param int $category Identifier of the category for which the caller wants the list of attributes
     *
     * @return \SellerCenter\SDK\Product\Api\GetCategoryAttributes\AttributeCollection
     */
    public function getCategoryAttributes($category);

    /**
     * @param int $attributeSet Id of the AttributeSet(s)
     *
     * @return \SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Response
     */
    public function getCategoriesByAttributeSet($attributeSet);
}
