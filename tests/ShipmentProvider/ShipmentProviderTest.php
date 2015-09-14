<?php namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders\Body;
use SellerCenter\SDK\ShipmentProvider\Api\GetShipmentProviders\Response;
use SellerCenter\SDK\ShipmentProvider\ShipmentProviderCollection;
use SellerCenter\SDK\ShipmentProvider\ShipmentProvider;

class ShipmentProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetValue()
    {
        $shipmentProvider = new ShipmentProvider;
        $shipmentProvider
            ->setName('Correios')
        ;
        $this->assertAttributeEquals('Correios', 'name', $shipmentProvider);
        $this->assertEquals('Correios', $shipmentProvider->getName());
    }

    public function testGetBrandsResponse()
    {
        $collection = new ShipmentProviderCollection;

        $shipmentProvider = new ShipmentProvider;
        $shipmentProvider->setName('Correios');
        $collection->add($shipmentProvider);

        $body = new Body;
        $body->setShipmentProviders($collection);

        $response = new Response;
        $response->setBody($body);

        $this->assertEquals($shipmentProvider, $response->getBody()->getShipmentProviders()->first());
        $this->assertEquals(
            [
                'Correios',
            ],
            $response->getBody()->toArray()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Value is not an instance of ShipmentProvider
     */
    public function testAddInvalidShipmentProviderShouldThrowInvalidArgumentException()
    {
        $collection = new ShipmentProviderCollection;
        $collection->add(1);
    }
}
