<?php namespace SellerCenter\SDK\Product;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class CategoryAttribute
 *
 * @package SellerCenter\SDK\Feed
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class CategoryAttribute
{
    /**
     * @var \SellerCenter\SDK\Common\Api\Response\Success\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Body")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\CategoryAttribute\Attribute>")
     * @JMS\XmlList(entry="Attribute")
     */
    protected $body;

    /**
     * @return \SellerCenter\SDK\Common\Api\Response\Success\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param \SellerCenter\SDK\Common\Api\Response\Success\Head $head
     *
     * @return CategoryAttribute
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param ArrayCollection $body
     *
     * @return CategoryAttribute
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
