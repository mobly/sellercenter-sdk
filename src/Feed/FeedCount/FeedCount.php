<?php namespace SellerCenter\SDK\Feed\FeedCount;

use JMS\Serializer\Annotation as JMS;

/**
 * Class FeedCountData
 *
 * @package SellerCenter\SDK\Feed\FeedCount
 * @author Daniel Costa
 */
class FeedCount
{
    /**
     * @var int
     * @JMS\SerializedName("Total")
     * @JMS\Type("integer")
     */
    protected $total;

    /**
     * @var int
     * @JMS\SerializedName("Queued")
     * @JMS\Type("integer")
     */
    protected $queued;

    /**
     * @var int
     * @JMS\SerializedName("Processing")
     * @JMS\Type("integer")
     */
    protected $processing;

    /**
     * @var int
     * @JMS\SerializedName("Finished")
     * @JMS\Type("integer")
     */
    protected $finished;

    /**
     * @var int
     * @JMS\SerializedName("Canceled")
     * @JMS\Type("integer")
     */
    protected $canceled;

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     *
     * @return FeedCount
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return int
     */
    public function getQueued()
    {
        return $this->queued;
    }

    /**
     * @param int $queued
     *
     * @return FeedCount
     */
    public function setQueued($queued)
    {
        $this->queued = $queued;

        return $this;
    }

    /**
     * @return int
     */
    public function getProcessing()
    {
        return $this->processing;
    }

    /**
     * @param int $processing
     *
     * @return FeedCount
     */
    public function setProcessing($processing)
    {
        $this->processing = $processing;

        return $this;
    }

    /**
     * @return int
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * @param int $finished
     *
     * @return FeedCount
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * @return int
     */
    public function getCanceled()
    {
        return $this->canceled;
    }

    /**
     * @param int $canceled
     *
     * @return FeedCount
     */
    public function setCanceled($canceled)
    {
        $this->canceled = $canceled;

        return $this;
    }
}
