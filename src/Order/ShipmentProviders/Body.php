<?php namespace SellerCenter\SDK\Order\ShipmentProviders;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\ShipmentProviders
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("ShipmentProviders")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Order\ShipmentProviders\ShipmentProvider>")
     * @JMS\XmlList(entry="ShipmentProvider")
     */
    protected $shipmentProviders;

    /**
     * @return ArrayCollection
     */
    public function getShipmentProviders()
    {
        return $this->shipmentProviders;
    }

    /**
     * @param ArrayCollection $shipmentProviders
     *
     * @return Body
     */
    public function setShipmentProviders($shipmentProviders)
    {
        $this->shipmentProviders = $shipmentProviders;

        return $this;
    }
}
