<?php namespace SellerCenter\SDK\Product\Enum;

use DanielCosta\Enum\Enum;

/**
 * Class StatusEnum
 *
 * @package SellerCenter\SDK\Product\Enum
 * @method static StatusEnum ACTIVE()
 * @method static StatusEnum INACTIVE()
 * @method static StatusEnum DELETED()
 */
class StatusEnum extends Enum
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const DELETED = 'deleted';
}
