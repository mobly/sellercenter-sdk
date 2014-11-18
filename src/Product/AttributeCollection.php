<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;

/**
 * Attribute Collection
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class AttributeCollection extends ArrayCollection
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof Attribute)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Attribute'
            );
        }

        return parent::add($value);
    }
}
