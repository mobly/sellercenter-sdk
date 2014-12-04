<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;

/**
 * Image Collection
 *
 * @package SellerCenter\SDK\Collection
 * @author  Daniel Costa
 */
class ProductImageCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof ProductImage)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Image'
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

        /* @var ProductImage $image */
        foreach ($this->getValues() as $image) {
            $data[] = $image->toArray();
        }

        return $data;
    }
}
