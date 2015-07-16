<?php namespace SellerCenter\SDK\Product;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Image
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 * @JMS\XmlRoot("ProductImage")
 * @JMS\AccessorOrder("custom", custom = {"SellerSku", "Elements"})
 */
class ProductImage extends ImageUriCollection
{
    use SellerSkuTrait;

    /**
     * Initializes a new ArrayCollection.
     *
     * @param string             $sellerSku
     * @param ImageUriCollection $elements
     */
    public function __construct($sellerSku, ImageUriCollection $elements = null)
    {
        $this->setSellerSku($sellerSku);

        if (count($elements)) {
            foreach ($elements as $element) {
                $this->add($element);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function add($element)
    {
        return parent::add($element);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [
            'SellerSku' => $this->getSellerSku(),
            'Images' => parent::toArray()
        ];
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\SerializedName("Images")
     * @JMS\XmlList(inline = false, entry = "Image")
     */
    public function getElements()
    {
        return parent::getElements();
    }
}
