<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;

/**
 * Class BasicProduct
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class BasicProduct implements ToArrayInterface
{
    use SellerSkuTrait;

    public function toArray()
    {
        return [
            'SellerSku' => $this->getSellerSku()
        ];
    }
}
