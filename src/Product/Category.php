<?php namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Brand
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class Category implements ToArrayInterface
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
     * @JMS\SerializedName("CategoryId")
     * @JMS\Type("integer")
     */
    private $categoryId;

    /**
     * @var CategoryCollection
     * @JMS\SerializedName("Children")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Category>")
     * @JMS\XmlList(entry="Category")
     */
    private $children;

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
     * @return Category
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
     * @return Category
     */
    public function setGlobalIdentifier($globalIdentifier)
    {
        $this->globalIdentifier = $globalIdentifier;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     *
     * @return Category
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return CategoryCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param CategoryCollection $children
     *
     * @return Category
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    public function toArray()
    {
        return [
            'categoryId' => $this->getCategoryId(),
            'globalIdentifier' => $this->getGlobalIdentifier(),
            'name' => $this->getName(),
            'children' => $this->children instanceof CategoryCollection ? $this->getChildren()->toArray() : []
        ];
    }
}
