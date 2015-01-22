<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;


/**
 * Class Image
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 * @JMS\XmlRoot("ProductImage")
 */
class ProductImage implements ToArrayInterface
{
    use SellerSkuTrait;

    /**
     * @var ImageUriCollection
     * @JMS\SerializedName("Images")
     * @JMS\Type("SellerCenter\SDK\Product\ImageUriCollection")
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
}
