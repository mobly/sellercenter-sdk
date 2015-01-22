<?php

namespace SellerCenter\SDK\Feed\Contract;

use SellerCenter\SDK\Feed\FeedCount;
use SellerCenter\SDK\Feed\FeedList;

/**
 * Feed Interface
 *
 * @package SellerCenter\SDK
 * @author  Daniel Costa
 */
interface FeedInterface
{
    /**
     * @return FeedList
     */
    public function feedList();

    /**
     * @param int $offset
     * @param int $pageSize
     * @param string $status
     *
     * @return FeedList
     */
    public function feedOffsetList($offset = null, $pageSize = null, $status = null);

    /**
     * @return FeedCount
     */
    public function feedCount();

    public function feedStatus($feedId);

    public function feedCancel($feedId);
}
