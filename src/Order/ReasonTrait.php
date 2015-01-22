<?php

namespace SellerCenter\SDK\Order;

trait ReasonTrait
{
    /** @var string */
    protected $reason;

    /** @var string */
    protected $reasonDetail;

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return ReasonTrait
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return string
     */
    public function getReasonDetail()
    {
        return $this->reasonDetail;
    }

    /**
     * @param string $reasonDetail
     *
     * @return ReasonTrait
     */
    public function setReasonDetail($reasonDetail)
    {
        $this->reasonDetail = $reasonDetail;

        return $this;
    }
}
