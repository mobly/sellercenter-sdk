<?php namespace SellerCenter\SDK\Order\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class DeliveryTypeEnum
 *
 * @package SellerCenter\SDK\Status\Enum
 * @author  Daniel Costa
 * @method static DeliveryTypeEnum DROPSHIP()
 * @method static DeliveryTypeEnum PICKUP()
 * @method static DeliveryTypeEnum SEND_TO_WAREHOUSE()
 */
class DeliveryTypeEnum extends Enum
{
    const DROPSHIP = 'dropship';
    const PICKUP = 'pickup';
    const SEND_TO_WAREHOUSE = 'send_to_warehouse';
}
