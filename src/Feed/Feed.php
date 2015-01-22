<?php

namespace SellerCenter\SDK\Feed;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Feed
 *
 * @package SellerCenter\SDK\Feed
 * @author Daniel Costa
 */
class Feed
{
    /**
     * @var string
     * @JMS\SerializedName("Feed")
     * @JMS\Type("string")
     */
    protected $feed;

    /**
     * @var string
     * @JMS\SerializedName("Status")
     * @JMS\Type("string")
     */
    protected $status;

    /**
     * @var string
     * @JMS\SerializedName("Action")
     * @JMS\Type("string")
     */
    protected $action;

    /**
     * @var DateTime
     * @JMS\SerializedName("CreationDate")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $creationDate;

    /**
     * @var DateTime
     * @JMS\SerializedName("UpdatedDate")
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $updatedDate;

    /**
     * @var string
     * @JMS\SerializedName("Source")
     * @JMS\Type("string")
     */
    protected $source;

    /**
     * @var int
     * @JMS\SerializedName("TotalRecords")
     * @JMS\Type("integer")
     */
    protected $totalRecords;

    /**
     * @var int
     * @JMS\SerializedName("ProcessedRecords")
     * @JMS\Type("integer")
     */
    protected $processedRecords;

    /**
     * @var int
     * @JMS\SerializedName("FailedRecords")
     * @JMS\Type("integer")
     */
    protected $failedRecords;

    /**
     * @return string
     */
    public function getFeed()
    {
        return $this->feed;
    }

    /**
     * @param string $feed
     *
     * @return Feed
     */
    public function setFeed($feed)
    {
        $this->feed = $feed;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Feed
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return Feed
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     *
     * @return Feed
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * @param DateTime $updatedDate
     *
     * @return Feed
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return Feed
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalRecords()
    {
        return $this->totalRecords;
    }

    /**
     * @param int $totalRecords
     *
     * @return Feed
     */
    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;

        return $this;
    }

    /**
     * @return int
     */
    public function getProcessedRecords()
    {
        return $this->processedRecords;
    }

    /**
     * @param int $processedRecords
     *
     * @return Feed
     */
    public function setProcessedRecords($processedRecords)
    {
        $this->processedRecords = $processedRecords;

        return $this;
    }

    /**
     * @return int
     */
    public function getFailedRecords()
    {
        return $this->failedRecords;
    }

    /**
     * @param int $failedRecords
     *
     * @return Feed
     */
    public function setFailedRecords($failedRecords)
    {
        $this->failedRecords = $failedRecords;

        return $this;
    }
}
