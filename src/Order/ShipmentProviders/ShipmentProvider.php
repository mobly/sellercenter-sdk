<?php

namespace SellerCenter\SDK\Order\ShipmentProviders;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Reason
 *
 * @package SellerCenter\SDK\Order\ShipmentProviders
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
     * @return Reason
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
