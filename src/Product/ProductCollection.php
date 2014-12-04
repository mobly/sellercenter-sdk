<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;

/**
 * Product Collection
 *
 * @package SellerCenter\SDK\Collection
 * @author  Daniel Costa
 */
class ProductCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof Product)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Product'
            );
        }

        return parent::add($value);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var Product $product */
        foreach ($this->getValues() as $product) {
            $data[] = $product->toArray();
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function toXmlArray()
    {
        $data = [];

        /* @var Product $product */
        foreach ($this->getValues() as $product) {
            $data[] = $product->toXmlArray();
        }

        return $data;
    }
}
