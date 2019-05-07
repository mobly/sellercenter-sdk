<?php namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Command\ToArrayInterface;
use InvalidArgumentException;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AttributeSetCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class AttributeSetCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof AttributeSet)) {
            throw new InvalidArgumentException(
                'Value is not an instance of AttributeSet'
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

        /* @var AttributeSet $attributeSet */
        foreach ($this->getValues() as $attributeSet) {
            $data[$attributeSet->getGlobalIdentifier()] = $attributeSet->toArray();
        }

        return $data;
    }
}
