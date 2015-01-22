<?php

namespace SellerCenter\SDK\Common\Api\ErrorResponse;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Common\Api\ErrorResponse
 * @author Daniel Costa
 */
class Body
{
    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Common\Api\ErrorResponse\Detail>")
     * @JMS\XmlList(entry="ErrorDetail")
     */
    protected $detail;

    /**
     * @return ArrayCollection
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param ArrayCollection $detail
     *
     * @return Body
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }
}
