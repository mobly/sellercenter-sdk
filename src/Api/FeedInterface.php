<?php

namespace Mobly\SellerCenterSDK\Api;

/**
 * Interface FeedInterface
 *
 * @package Mobly\SellerCenterSDK\Core
 * @author  Daniel Costa
 */
interface FeedInterface
{
    public function feedList();

    public function feedOffsetList();

    public function feedCount();

    public function feedStatus();

    public function feedCancel();
}
