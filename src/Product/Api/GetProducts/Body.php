<?php namespace SellerCenter\SDK\Product\Api\GetProducts;

use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Product\ProductCollection;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Product\Api\GetProducts
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body implements ToArrayInterface
{
    /**
     * @var ProductCollection
     * @JMS\SerializedName("Products")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Product>")
     * @JMS\XmlList(entry="Product")
     */
    protected $products;

    /**
     * @return ProductCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ProductCollection $products
     *
     * @return Body
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->products->toArray();
    }
}
