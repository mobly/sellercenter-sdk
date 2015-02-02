<?php

namespace SellerCenter\SDK\Order\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class FailureTypeEnum
 *
 * @package SellerCenter\SDK\Status\Enum
 * @author  Daniel Costa
 * @method static DeliveryTypeEnum CANCELED()
 * @method static DeliveryTypeEnum FAILED()
 * @method static DeliveryTypeEnum RETURNED()
 */
class FailureTypeEnum extends Enum
{
    const CANCELED = 'canceled';
    const FAILED = 'failed';
    const RETURNED = 'returned';
}
