<?php namespace SellerCenter\SDK\Product\Api\GetProducts;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class Response
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 * @JMS\AccessorOrder("custom", custom = {"head", "body"})
 */
class Response extends SuccessResponse
{
    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Product\Api\GetProducts\Body")
     */
    protected $body;

    /**
     * @return Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param \SellerCenter\SDK\Common\Api\Response\Success\Body $body
     *
     * @return Response
     */
    public function setBody(\SellerCenter\SDK\Common\Api\Response\Success\Body $body)
    {
        $this->body = $body;

        return $this;
    }
}
