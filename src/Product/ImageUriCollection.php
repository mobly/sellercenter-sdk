<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;
use Zend\Uri\Uri;

/**
 * Images Uri Collection
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ImageUriCollection extends ArrayCollection
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof Uri)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Zend\Uri\Uri'
            );
        }

        return parent::add($value);
    }
}
