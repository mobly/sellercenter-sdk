<?php namespace SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class Response
 *
 * @package SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 * @JMS\AccessorOrder("custom", custom = {"head", "body"})
 */
class Response extends SuccessResponse
{
    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Product\Api\GetCategoriesByAttributeSet\Body")
     */
    protected $body;
}
