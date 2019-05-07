<?php namespace SellerCenter\SDK\Product;

use GuzzleHttp\Command\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AttributeSet
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class AttributeSet implements ToArrayInterface
{
    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\SerializedName("GlobalIdentifier")
     * @JMS\Type("string")
     */
    private $globalIdentifier;

    /**
     * @var int
     * @JMS\SerializedName("AttributeSetId")
     * @JMS\Type("integer")
     */
    private $attributeSetId;

    /**
     * @var CategoryCollection
     * @JMS\SerializedName("Categories")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Category>")
     * @JMS\XmlList(entry="Category")
     */
    private $categories;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return AttributeSet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getGlobalIdentifier()
    {
        return $this->globalIdentifier;
    }

    /**
     * @param string $globalIdentifier
     *
     * @return AttributeSet
     */
    public function setGlobalIdentifier($globalIdentifier)
    {
        $this->globalIdentifier = $globalIdentifier;

        return $this;
    }

    /**
     * @return int
     */
    public function getAttributeSetId()
    {
        return $this->attributeSetId;
    }

    /**
     * @param int $attributeSetId
     *
     * @return AttributeSet
     */
    public function setAttributeSetId($attributeSetId)
    {
        $this->attributeSetId = $attributeSetId;

        return $this;
    }

    /**
     * @return CategoryCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param CategoryCollection $categories
     *
     * @return AttributeSet
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'attributeSetId' => $this->getAttributeSetId(),
            'globalIdentifier' => $this->getGlobalIdentifier(),
            'name' => $this->getName(),
            'categories' => $this->getCategories()
        ];
    }
}
