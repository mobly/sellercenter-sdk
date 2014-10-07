<?php

namespace SellerCenter\SDK\Entity;

use Zend\Uri\Uri;
use SellerCenter\SDK\Collection\UriCollection;

/**
 * Class Image
 *
 * @package SellerCenter\SDK\Entity
 * @author  Daniel Costa
 */
class Image
{
    /**
     * @var string
     */
    protected $sellerSku;

    /**
     * @var UriCollection
     */
    protected $images;

    /**
     * @var Uri
     */
    protected $image;

    /**
     * @return Uri
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Uri $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        if (!($image instanceof Uri)) {
            throw new \InvalidArgumentException(
                'Image is not a valid instance of Zend\Uri\Uri, ' . gettype($image) . ' passed'
            );
        }

        $this->image = $image;

        return $this;
    }

    /**
     * @return UriCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param UriCollection $images
     *
     * @return $this
     */
    public function setImages($images)
    {
        if (!($images instanceof UriCollection)) {
            throw new \InvalidArgumentException(
                'Images is not a valid instance of UriCollection, ' . gettype($images) . ' passed'
            );
        }

        $this->images = $images;

        return $this;
    }

    /**
     * @return string
     */
    public function getSellerSku()
    {
        return $this->sellerSku;
    }

    /**
     * @param string $sellerSku
     *
     * @return $this
     */
    public function setSellerSku($sellerSku)
    {
        if (!is_string($sellerSku)) {
            throw new \InvalidArgumentException('Seller SKU is not a valid string, ' . gettype($sellerSku) . ' passed');
        }

        $this->sellerSku = $sellerSku;

        return $this;
    }
}
