<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * Image Collection
 *
 * @package SellerCenter\SDK\Collection
 * @author  Daniel Costa
 */
class ImageCollection extends ArrayCollection
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof Image)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Image'
            );
        }

        return parent::add($value);
    }
}
