<?php namespace SellerCenter\SDK\Product\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class ConditionEnum
 *
 * @package SellerCenter\SDK\Product\Enum
 * @method static ConditionEnum NEW_PRODUCT()
 * @method static ConditionEnum USED()
 * @method static ConditionEnum REFURBISHED()
 */
class ConditionEnum extends Enum
{
    const NEW_PRODUCT = 'new';
    const USED = 'used';
    const REFURBISHED = 'refurbished';
}
