<?php namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Command\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("Request")
 * @JMS\AccessorOrder("custom", custom = {"Elements"})
 */
class ProductCollection extends ArrayCollection implements ToArrayInterface
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
        if (!$element instanceof AbstractProduct) {
            throw new \InvalidArgumentException('Element is not an instance of Product');
        }

        return parent::add($element);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var Product $element */
        foreach (parent::toArray() as $element) {
            $data[] = $element->toArray();
        }

        return $data;
    }

    /**
     * @JMS\VirtualProperty
     * @JMS\XmlList(inline = true, entry = "Product")
     */
    public function getElements()
    {
        return parent::toArray();
    }
}
