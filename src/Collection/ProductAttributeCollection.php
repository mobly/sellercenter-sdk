<?php

namespace Mobly\SellerCenterSDK\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use Mobly\SellerCenterSDK\Entity\ProductAttribute;

/**
 * Class Product Attribute Collection
 *
 * @package Mobly\SellerCenterSDK\Collection
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
