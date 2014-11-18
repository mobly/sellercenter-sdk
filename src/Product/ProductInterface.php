<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\Command\ServiceClientInterface;

/**
 * Product Interface
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
interface ProductInterface extends ServiceClientInterface
{
    public function price(Product $product);

    public function image(Image $image);

    public function productAdd(Product $product);

    public function productUpdate(ProductCollection $product);

    public function productRemove(ProductCollection $product);
}
