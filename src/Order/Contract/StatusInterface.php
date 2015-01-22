<?php

namespace SellerCenter\SDK\Order\Contract;

use GuzzleHttp\Command\ServiceClientInterface;
use SellerCenter\SDK\Order\Status\ToCancel;
use SellerCenter\SDK\Order\Status\ToDelivered;
use SellerCenter\SDK\Order\Status\ToFailedDelivery;
use SellerCenter\SDK\Order\Status\ToReadyToShip;
use SellerCenter\SDK\Order\Status\ToShipped;

interface StatusInterface extends ServiceClientInterface
{
    public function setStatusToCanceled(ToCancel $order);

    public function setStatusToReadyToShip(ToReadyToShip $order);

    public function setStatusToShipped(ToShipped $order);

    public function setStatusToFailedDelivery(ToFailedDelivery $order);

    public function setStatusToDelivered(ToDelivered $order);
}
