<?php

namespace SellerCenter\SDK\Product\Products;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Product\Products
 * @author Daniel Costa
 */
class Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Products")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Product>")
     * @JMS\XmlList(entry="Product")
     */
    protected $products;

    /**
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection $products
     *
     * @return Body
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
}
