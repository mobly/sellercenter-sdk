<?php namespace SellerCenter\SDK\Product\Enum;

use DanielCosta\Enum\Enum;

/**
 * Class ShipmentTypeEnum
 *
 * @package SellerCenter\SDK\Product\Enum
 * @method static ShipmentTypeEnum CROSSDOCKING()
 * @method static ShipmentTypeEnum DROPSHIPPING()
 */
class ShipmentTypeEnum extends Enum
{
    const CROSSDOCKING = 'crossdocking';
    const DROPSHIPPING = 'dropshipping';
}
