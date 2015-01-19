<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use SellerCenter\SDK\Common\ToXmlArrayInterface;

/**
 * Class Image
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ProductImage implements ToArrayInterface, ToXmlArrayInterface
{
    use SellerSkuTrait;

    /**
     * @var ImageUriCollection
     */
    protected $images;

    public function __construct()
    {
        $this->setImages(new ImageUriCollection);
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
            'SellerSku' => $this->getSellerSku(),
            'Images' => $this->getImages()->toArray()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function toXmlArray()
    {
        return [
            'ProductImage' => [
                'SellerSku' => $this->getSellerSku(),
                'Images' => $this->getImages()->toXmlArray()
            ]
        ];
    }
}
