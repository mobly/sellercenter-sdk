<?php namespace SellerCenter\SDK\Order\FailureReason;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Order\FailureReason
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body
{
    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Reasons")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Order\FailureReason\Reason>")
     * @JMS\XmlList(entry="Reason")
     */
    protected $reasons;

    /**
     * @return ArrayCollection
     */
    public function getReasons()
    {
        return $this->reasons;
    }

    /**
     * @param array $reasons
     *
     * @return ArrayCollection
     */
    public function setReasons($reasons)
    {
        $this->reasons = $reasons;

        return $this;
    }
}
