<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use Zend\Uri\Uri;

/**
 * Class Image
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class Image implements ToArrayInterface
{
    use SellerSkuTrait;

    /**
     * @var ImageUriCollection
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
            throw new InvalidArgumentException(
                'Image is not an instance of Zend\Uri\Uri'
            );
        }

        $this->image = $image;

        return $this;
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
     * @return $this
     */
    public function setImages($images)
    {
        if (!($images instanceof ImageUriCollection)) {
            throw new InvalidArgumentException(
                'Images is not an instance of UriCollection'
            );
        }

        $this->images = $images;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'sellerSku' => $this->getSellerSku(),
            'image' => $this->getImage()->toString(),
            'images' => $this->getImages()->toArray()
        ];
    }
}
