<?php namespace SellerCenter\SDK\Product\Api\GetCategoryAttributes;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class AttributeCollection
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class AttributeCollection extends SuccessResponse
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Body")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Api\GetCategoryAttributes\Attribute>")
     * @JMS\XmlList(entry="Attribute")
     */
    protected $body;
}
