<?php namespace SellerCenter\SDK\ShipmentProvider;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Command\ToArrayInterface;
use InvalidArgumentException;

/**
 * Class GetShipmentProviders
 *
 * @package SellerCenter\SDK\Order
 * @author Daniel Costa
 */
class ShipmentProviderCollection extends ArrayCollection implements ToArrayInterface
{
    /**
     * {@inheritDoc}
     */
    public function add($value)
    {
        if (!($value instanceof ShipmentProvider)) {
            throw new InvalidArgumentException(
                'Value is not an instance of ShipmentProvider'
            );
        }

        return parent::add($value);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [];

        /* @var ShipmentProvider $shipmentProvider */
        foreach ($this->getValues() as $shipmentProvider) {
            $data[] = $shipmentProvider->getName();
        }

        return $data;
    }
}
