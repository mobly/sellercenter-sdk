<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use SellerCenter\SDK\Common\ToXmlArrayInterface;

/**
 * Images Uri Collection
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ImageUriCollection extends ArrayCollection implements ToArrayInterface, ToXmlArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof ImageUri)) {
            throw new InvalidArgumentException(
                'Value is not an instance of ImageUri'
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

        /* @var ImageUri $image */
        foreach ($this->getValues() as $image) {
            $data[] = $image->toString();
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function toXmlArray()
    {
        $data = [];

        /* @var ImageUri $image */
        foreach ($this->getValues() as $image) {
            $data[] = ['Image' => $image->toString()];
        }

        return $data;
    }
}
