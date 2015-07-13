<?php

namespace SellerCenter\SDK\Product;

use Countable;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductImageCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("Request")
 * @JMS\AccessorOrder("custom", custom = {"Elements"})
 */
class ProductImageCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * Initializes a new ArrayCollection.
     *
     * @param array $images
     */
    public function __construct(array $images = array())
    {
        if (count($images)) {
            foreach ($images as $image) {
                $this->add($image);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function add($image)
    {
        if (!$image instanceof ProductImage) {
            throw new \InvalidArgumentException('Element is not an instance of ProductImage');
        }

        return parent::add($image);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var ProductImage $image */
        foreach (parent::toArray() as $image) {
            $data[] = $image->toArray();
        }

        return $data;
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\XmlList(inline = true, entry = "ProductImage")
     */
    public function getElements()
    {
        return parent::toArray();
    }
}
