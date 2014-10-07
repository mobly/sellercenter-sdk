<?php

namespace SellerCenter\SDK;

/**
 * Feed Interface
 *
 * @package SellerCenter\SDK
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
