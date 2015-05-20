<?php

namespace SellerCenter\SDK\Product;

use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;

/**
 * ShopSku Trait
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
trait ShopSkuTrait
{
    /**
     * The unique shop SKU for the product
     *
     * @var string
     * @JMS\SerializedName("ShopSku")
     * @JMS\Type("string")
     */
    protected $shopSku;

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
    }

    /**
     * @param string $shopSku
     *
     * @return $this
     */
    public function setShopSku($shopSku)
    {
        if (!is_string($shopSku)) {
            throw new InvalidArgumentException('Shop SKU is not a valid string, ' . gettype($shopSku) . ' passed');
        }

        $this->shopSku = $shopSku;

        return $this;
    }
}
