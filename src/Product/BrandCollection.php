<?php namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BrandCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class BrandCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof Brand)) {
            throw new InvalidArgumentException(
                'Value is not an instance of Brand'
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

        /* @var Brand $brand */
        foreach ($this->getValues() as $brand) {
            $data[$brand->getGlobalIdentifier()] = $brand->toArray();
        }

        return $data;
    }
}
