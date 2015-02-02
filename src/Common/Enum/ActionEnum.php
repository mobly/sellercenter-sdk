<?php

namespace SellerCenter\SDK\Common\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class ActionEnum
 *
 * @package SellerCenter\SDK\Common\Enum
 * @author  Daniel Costa
 * @method static ActionEnum INVENTORY()
 * @method static ActionEnum PRICE()
 * @method static ActionEnum PRODUCT_ADD()
 * @method static ActionEnum PRODUCT_UPDATE()
 * @method static ActionEnum PRODUCT_REMOVE()
 * @method static ActionEnum IMAGE()
 * @method static ActionEnum FEED_LIST()
 * @method static ActionEnum FEED_OFFSET_LIST()
 * @method static ActionEnum FEED_COUNT()
 * @method static ActionEnum FEED_STATUS()
 * @method static ActionEnum FEED_CANCEL()
 */
class ActionEnum extends Enum
{
    const INVENTORY = 'Inventory';
    const PRICE = 'Price';
    const PRODUCT_ADD = 'ProductAdd';
    const PRODUCT_UPDATE = 'ProductUpdate';
    const PRODUCT_REMOVE = 'ProductRemove';
    const IMAGE = 'Image';
    const FEED_LIST = 'FeedList';
    const FEED_OFFSET_LIST = 'FeedOffsetList';
    const FEED_COUNT = 'FeedCount';
    const FEED_STATUS = 'FeedStatus';
    const FEED_CANCEL = 'FeedCancel';
}
