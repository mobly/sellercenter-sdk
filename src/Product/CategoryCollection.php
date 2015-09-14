<?php namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class CategoryCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class CategoryCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof Category)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Category'
            );
        }

        return parent::add($value);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var Category $category */
        foreach ($this->getValues() as $category) {
            $data[$category->getGlobalIdentifier()] = $category->toArray();
        }

        return $data;
    }
}
