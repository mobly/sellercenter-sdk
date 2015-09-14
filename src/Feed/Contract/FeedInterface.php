<?php namespace SellerCenter\SDK\Feed\Contract;

/**
 * Feed Interface
 *
 * @package SellerCenter\SDK
 * @author  Daniel Costa
 */
interface FeedInterface
{
    /**
     * Returns all feeds created in the last 30 days
     *
     * @return \SellerCenter\SDK\Feed\FeedList
     */
    public function feedList();

    /**
     * Returns all or a subset of all feeds created in the last 30 days
     *
     * @param int       $offset
     * @param int       $pageSize
     * @param string    $status
     * @param \DateTime $creationDate
     * @param \DateTime $updatedDate
     *
     * @return \SellerCenter\SDK\Feed\FeedList
     */
    public function feedOffsetList(
        $offset = null,
        $pageSize = null,
        $status = null,
        \DateTime $creationDate = null,
        \DateTime $updatedDate = null
    );

    /**
     * Feed Statistics
     *
     * @return \SellerCenter\SDK\Feed\FeedCount
     */
    public function feedCount();

    /**
     * Cancel all queued feeds
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function feedCancel();

    /**
     * For specified feeds, returns the XML requests originally passed in when the feed was created
     *
     * @param array $feedIds Array of Feed Ids
     *
     * @return \SellerCenter\SDK\Feed\Api\GetFeedRawInput\Response
     */
    public function getFeedRawInput(array $feedIds);

    /**
     * Returns detailed information about a specified feed
     *
     * @param string $feedId The identifier (UUID) of the feed
     *
     * @return \SellerCenter\SDK\Feed\FeedStatus
     */
    public function feedStatus($feedId);
}
