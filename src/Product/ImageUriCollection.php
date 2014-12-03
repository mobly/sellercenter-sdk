<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use Zend\Uri\Uri;

/**
 * Images Uri Collection
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ImageUriCollection extends ArrayCollection implements ToArrayInterface
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

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var \Zend\Uri\Uri $image */
        foreach ($this->getValues() as $image) {
            $data[] = $image->toString();
        }

        return $data;
    }
}
