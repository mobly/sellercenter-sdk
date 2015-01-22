<?php

namespace SellerCenter\SDK\Product;

use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Product\Contract\ProductInterface;

/**
 * Class ProductClient
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ProductClient extends SdkClient implements ProductInterface
{
    /**
     * @var string
     */
    protected $action = 'Product';

    /**
     * @return \SellerCenter\SDK\Product\Products
     */
    public function getProducts()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    /**
     * @param Product $product
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productCreate(Product $product)
    {
        $request = new ProductCollection();
        $request->add($product);

        $data = [
            'ProductRequest' => $request
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productUpdate(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productRemove(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductImageCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function image(ProductImageCollection $collection)
    {
        $data = [
            'ProductImageRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }
}
