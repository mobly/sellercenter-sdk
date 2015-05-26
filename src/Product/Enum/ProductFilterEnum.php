<?php namespace SellerCenter\SDK\Product\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class ProductFilterEnum
 *
 * @package SellerCenter\SDK\Product\Enum
 * @method static ProductFilterEnum ALL()
 * @method static ProductFilterEnum ACTIVE()
 * @method static ProductFilterEnum INACTIVE()
 * @method static ProductFilterEnum DELETED()
 * @method static ProductFilterEnum IMAGE_MISSING()
 * @method static ProductFilterEnum PENDING()
 * @method static ProductFilterEnum REJECTED()
 * @method static ProductFilterEnum SOLD_OUT()
 */
class ProductFilterEnum extends Enum
{
    const ALL = 'all';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const DELETED = 'deleted';
    const IMAGE_MISSING = 'image-missing';
    const PENDING = 'pending';
    const REJECTED = 'rejected';
    const SOLD_OUT = 'sold-out';
}
