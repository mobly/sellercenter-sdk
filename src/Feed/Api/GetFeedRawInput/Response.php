<?php namespace SellerCenter\SDK\Feed\Api\GetFeedRawInput;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class Response
 *
 * @package SellerCenter\SDK\Feed\Api\GetFeedRawInput
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 * @JMS\AccessorOrder("custom", custom = {"head", "body"})
 */
class Response extends SuccessResponse
{
    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Feed\Api\GetFeedRawInput\Body")
     */
    protected $body;
}
