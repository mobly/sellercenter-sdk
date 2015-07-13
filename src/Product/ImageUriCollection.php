<?php

namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Images Uri Collection
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 * @JMS\XmlRoot("Images")
 * @JMS\AccessorOrder("custom", custom = {"Elements"})
 */
class ImageUriCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * Initializes a new ArrayCollection.
     *
     * @param array $images
     */
    public function __construct(array $images = [])
    {
        parent::__construct();

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
        if (!$image instanceof ImageUri) {
            throw new \InvalidArgumentException('Image is not an instance of ImageUri');
        }

        return parent::add($image);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        throw new \RuntimeException('Method set is not allowed');
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var ImageUri $image */
        foreach (parent::toArray() as $image) {
            $data[] = (string) $image;
        }

        return $data;
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\XmlList(inline = true, entry = "Image")
     */
    public function getElements()
    {
        return parent::toArray();
    }
}
