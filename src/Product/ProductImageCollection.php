<?php namespace SellerCenter\SDK\Product;

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
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        parent::__construct();

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
        if (!$element instanceof ProductImage) {
            throw new \InvalidArgumentException('Element is not an instance of ProductImage');
        }

        return parent::add($element);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var ProductImage $element */
        foreach (parent::toArray() as $element) {
            $data[] = $element->toArray();
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
