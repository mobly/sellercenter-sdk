<?php namespace SellerCenter\SDK\Product;

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
        if (!$element instanceof ImageUri) {
            throw new \InvalidArgumentException('Element is not an instance of ImageUri');
        }

        return parent::add($element);
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

        /* @var ImageUri $element */
        foreach (parent::toArray() as $element) {
            $data[] = (string) $element;
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
