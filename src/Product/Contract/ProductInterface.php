<?php

namespace SellerCenter\SDK\Product\Contract;

use GuzzleHttp\Command\ServiceClientInterface;
use SellerCenter\SDK\Product\Product;
use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\SDK\Product\ProductImage;
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
     * @return \SellerCenter\SDK\Product\Products
     */
    public function getProducts();

    /**
     * @param Product $product
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productCreate(Product $product);

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productUpdate(ProductCollection $collection);

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productRemove(ProductCollection $collection);

    /**
     * @param ProductImageCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function image(ProductImageCollection $collection);
}
