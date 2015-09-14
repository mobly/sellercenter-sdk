<?php namespace SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders;

use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\ShipmentProvider\ShipmentProviderCollection;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body implements ToArrayInterface
{
    /**
     * @var ShipmentProviderCollection
     * @JMS\SerializedName("GetShipmentProviders")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\ShipmentProvider\ShipmentProvider>")
     * @JMS\XmlList(entry="ShipmentProvider")
     */
    protected $shipmentProviders;

    /**
     * @return ShipmentProviderCollection
     */
    public function getShipmentProviders()
    {
        return $this->shipmentProviders;
    }

    /**
     * @param ShipmentProviderCollection $shipmentProviders
     *
     * @return Body
     */
    public function setShipmentProviders($shipmentProviders)
    {
        $this->shipmentProviders = $shipmentProviders;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->shipmentProviders->toArray();
    }
}
