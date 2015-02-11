<?php

namespace SellerCenter\SDK\Feed;

use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Feed\Contract\FeedInterface;

/**
 * Class Feed
 *
 * @package SellerCenter\SDK
 * @author  Daniel Costa
 */
class FeedClient extends SdkClient implements FeedInterface
{
    /**
     * @return FeedList
     */
    public function feedList()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    /**
     * @param int $offset
     * @param int $pageSize
     * @param string $status
     *
     * @return FeedList
     */
    public function feedOffsetList($offset = null, $pageSize = null, $status = null)
    {
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

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @return FeedCount
     */
    public function feedCount()
    {
        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), []));
    }

    public function feedStatus($feedId)
    {
        $data = [
            'FeedID' => $feedId
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    public function feedCancel($feedId)
    {
        $data = [
            'FeedID' => $feedId
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }
}
