<?php

namespace SellerCenter\SDK\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use SellerCenter\SDK\Entity\ProductAttribute;

/**
 * Class Product Attribute Collection
 *
 * @package SellerCenter\SDK\Collection
 * @author  Daniel Costa
 */
class ProductAttributeCollection extends ArrayCollection
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof ProductAttribute)) {
            throw new \InvalidArgumentException(
                'Value is not a valid instance of ProductAttribute, ' . gettype($value) . ' passed'
            );
        }

        return parent::add($value);
    }
}
