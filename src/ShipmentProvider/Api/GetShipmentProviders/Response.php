<?php namespace SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse;

/**
 * Class Response
 *
 * @package SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 * @JMS\AccessorOrder("custom", custom = {"head", "body"})
 */
class Response extends SuccessResponse
{
    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders\Body")
     */
    protected $body;
}
