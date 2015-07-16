<?php namespace SellerCenter\SDK\Product;

use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;

/**
 * SellerSku Trait
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
trait SellerSkuTrait
{
    /**
     * Seller's unique identifier
     *
     * @var string
     * @JMS\SerializedName("SellerSku")
     * @JMS\Type("string")
     */
    protected $sellerSku;

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
     * @return $this
     */
    public function setSellerSku($sellerSku)
    {
        if (!is_string($sellerSku)) {
            throw new InvalidArgumentException('Seller SKU is not a valid string, ' . gettype($sellerSku) . ' passed');
        }

        $this->sellerSku = $sellerSku;

        return $this;
    }
}
