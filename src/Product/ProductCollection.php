<?php

namespace SellerCenter\SDK\Product;

use Countable;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("Request")
 */
class ProductCollection implements ToArrayInterface, Countable
{
    /**
     * @JMS\XmlList(inline = true, entry = "Product")
     */
    protected $products;

    /**
     * @param ArrayCollection $products
     */
    public function __construct(ArrayCollection $products = null)
    {
        if (empty($products)) {
            $products = new ArrayCollection();
        }
        $this->setProducts($products);
    }

    /**
     * @param Product $product
     *
     * @return bool
     */
    public function add(Product $product)
    {
        return $this->getProducts()->add($product);
    }

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
     * @return ProductCollection
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *       </p>
     *       <p>
     *       The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->products);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var Product $product */
        foreach ($this->getProducts()->getValues() as $product) {
            $data[] = $product->toArray();
        }

        return $data;
    }
}
