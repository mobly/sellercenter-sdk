<?php

namespace Mobly\SellerCenter;

/**
 * Interface FeedInterface
 *
 * @package Mobly\SellerCenter\Core
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
