<?php namespace SellerCenter\SDK\Product\Api\GetBrands;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class Response
 *
 * @package SellerCenter\SDK\Product\Api\GetBrands
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 * @JMS\AccessorOrder("custom", custom = {"head", "body"})
 */
class Response extends SuccessResponse
{
    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Product\Api\GetBrands\Body")
     */
    protected $body;
}
