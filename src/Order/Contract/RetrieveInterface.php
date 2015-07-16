<?php namespace SellerCenter\SDK\Order\Contract;

use GuzzleHttp\Command\ServiceClientInterface;

interface RetrieveInterface extends ServiceClientInterface
{
    public function getFailureReasons();

    public function getShipmentProviders();
}
