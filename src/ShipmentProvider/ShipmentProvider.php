<?php namespace SellerCenter\SDK\ShipmentProvider;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Reason
 *
 * @package SellerCenter\SDK\ShipmentProvider\GetShipmentProviders
 * @author Daniel Costa
 */
class ShipmentProvider
{
    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ShipmentProvider
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
