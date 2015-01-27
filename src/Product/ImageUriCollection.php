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
class ImageUriCollection implements ToArrayInterface, \Countable
{
    /**
     * @var ArrayCollection
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
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ArrayCollection $images
     *
     * @return ArrayCollection
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

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *       </p>
     *       <p>
     *       The return value is cast to an integer.
     */
    public function count()
    {
        return $this->getImages()->count();
    }
}
