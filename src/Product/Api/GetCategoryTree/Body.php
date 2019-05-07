<?php namespace SellerCenter\SDK\Product\Api\GetCategoryTree;

use GuzzleHttp\Command\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Product\CategoryCollection;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Product\Api\GetCategoryTree
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body implements ToArrayInterface
{
    /**
     * @var CategoryCollection
     * @JMS\SerializedName("Categories")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Category>")
     * @JMS\XmlList(entry="Category")
     */
    protected $categories;

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
     * @return Body
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
        return $this->categories->toArray();
    }
}
