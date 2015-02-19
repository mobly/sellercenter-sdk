<?php

namespace SellerCenter\SDK\Order\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class FailureTypeEnum
 *
 * @package SellerCenter\SDK\Status\Enum
 * @author  Daniel Costa
 * @method static FailureTypeEnum CANCELED()
 * @method static FailureTypeEnum FAILED()
 * @method static FailureTypeEnum RETURNED()
 */
class FailureTypeEnum extends Enum
{
    const CANCELED = 'canceled';
    const FAILED = 'failed';
    const RETURNED = 'returned';
}
