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
 */
class ImageUriCollection implements ToArrayInterface
{
    /**
     * @var ImageUriCollection
     * @JMS\XmlList(inline = true, entry = "Image")
     */
    protected $images;

    public function __construct(ArrayCollection $products = null)
    {
        if (empty($products)) {
            $products = new ArrayCollection();
        }
        $this->setImages($products);
    }

    /**
     * {@inheritDoc}
     */
    public function add(ImageUri $image)
    {
        return $this->getImages()->add($image);
    }

    /**
     * @return ImageUriCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ImageUriCollection $images
     *
     * @return ImageUriCollection
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var ImageUri $image */
        foreach ($this->getImages()->getValues() as $image) {
            $data[] = $image->toString();
        }

        return $data;
    }
}
