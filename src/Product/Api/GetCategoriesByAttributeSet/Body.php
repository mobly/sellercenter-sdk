<?php namespace SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet;

use GuzzleHttp\Command\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Product\AttributeSetCollection;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body implements ToArrayInterface
{
    /**
     * @var AttributeSetCollection
     * @JMS\SerializedName("AttributeSets")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\AttributeSet>")
     * @JMS\XmlList(entry="AttributeSet")
     */
    protected $attributeSets;

    /**
     * @return AttributeSetCollection
     */
    public function getAttributeSets()
    {
        return $this->attributeSets;
    }

    /**
     * @param AttributeSetCollection $attributeSets
     *
     * @return Body
     */
    public function setAttributeSets($attributeSets)
    {
        $this->attributeSets = $attributeSets;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->attributeSets->toArray();
    }
}
