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
    /**
     * @param ToCancel $order
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function setStatusToCanceled(ToCancel $order);

    /**
     * @param ToReadyToShip $order
     *
     * @return \SellerCenter\SDK\Order\StatusToReadyToShip
     */
    public function setStatusToReadyToShip(ToReadyToShip $order);

    /**
     * @param ToShipped $order
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function setStatusToShipped(ToShipped $order);

    /**
     * @param ToFailedDelivery $order
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function setStatusToFailedDelivery(ToFailedDelivery $order);

    /**
     * @param ToDelivered $order
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function setStatusToDelivered(ToDelivered $order);
}
