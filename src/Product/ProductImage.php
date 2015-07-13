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
 * @JMS\AccessorOrder("custom", custom = {"SellerSku", "Images"})
 */
class ProductImage implements ToArrayInterface
{
    use SellerSkuTrait;

    /**
     * @var ImageUriCollection
     * @JMS\SerializedName("Images")
     * @JMS\Type("SellerCenter\SDK\Product\ImageUriCollection")
     */
    private $images;

    public function __construct($sellerSku, ImageUriCollection $images = null)
    {
        $this->setSellerSku($sellerSku);
        $this->images = new ImageUriCollection;
        if (count($images)) {
            foreach ($images as $image) {
                $this->add($image);
            }
        }
    }

    /**
     * @param ImageUri $image
     *
     * @return bool
     */
    public function add(ImageUri $image)
    {
        $this->images->add($image);

        return true;
    }

    /**
     * @return ImageUriCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'SellerSku' => $this->getSellerSku(),
            'Images' => $this->images->toArray()
        ];
    }
}
