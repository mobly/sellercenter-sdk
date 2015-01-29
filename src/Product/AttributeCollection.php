<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;

/**
 * Attribute Collection
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class AttributeCollection extends ArrayCollection implements ToArrayInterface
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

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var Attribute $attribute */
        foreach ($this->getValues() as $attribute) {
            $data[$attribute->getName()] = $attribute->getValue();
        }

        return $data;
    }
}
