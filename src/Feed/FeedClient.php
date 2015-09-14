<?php namespace SellerCenter\SDK\Feed;

use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Feed\Contract\FeedInterface;

/**
 * Class Feed
 *
 * @package SellerCenter\SDK
 * @author  Daniel Costa
 * @codeCoverageIgnore
 */
class FeedClient extends SdkClient implements FeedInterface
{
    /**
     * Returns all feeds created in the last 30 days
     *
     * @return FeedList
     */
    public function feedList()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    /**
     * Returns all or a subset of all feeds created in the last 30 days
     *
     * @param int       $offset
     * @param int       $pageSize
     * @param string    $status
     * @param \DateTime $creationDate
     * @param \DateTime $updatedDate
     *
     * @return FeedList
     */
    public function feedOffsetList(
        $offset = null,
        $pageSize = null,
        $status = null,
        \DateTime $creationDate = null,
        \DateTime $updatedDate = null
    ) {
        $data = [];
        if (!empty($offset)) {
            $data['Offset'] = $offset;
        }
        if (!empty($pageSize)) {
            $data['PageSize'] = $pageSize;
        }
        if (!empty($status)) {
            $data['Status'] = $status;
        }
        if (!empty($creationDate)) {
            $data['CreationDate'] = $creationDate->format(DATE_ISO8601);
        }
        if (!empty($updatedDate)) {
            $data['UpdatedDate'] = $updatedDate->format(DATE_ISO8601);
        }

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Feed Statistics
     *
     * @return FeedCount
     */
    public function feedCount()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    /**
     * Cancel all queued feeds
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function feedCancel()
    {
        $data = [];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * For specified feeds, returns the XML requests originally passed in when the feed was created
     *
     * @param array $feedIds Array of Feed Ids
     *
     * @return \SellerCenter\SDK\Feed\Api\GetFeedRawInput\Response
     */
    public function getFeedRawInput(array $feedIds)
    {
        $data = [
            'FeedIdList' => json_encode($feedIds)
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * Returns detailed information about a specified feed
     *
     * @param string $feedId The identifier (UUID) of the feed
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function feedStatus($feedId)
    {
        $data = [
            'FeedID' => $feedId
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }
}
