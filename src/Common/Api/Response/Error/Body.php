<?php namespace SellerCenter\SDK\Common\Api\Response\Error;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\BodyInterface;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Common\Api\Response\Error\ErrorResponse
 * @author Daniel Costa
 */
class Body implements BodyInterface
{
    /**
     * @var ArrayCollection
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Common\Api\Response\Error\ErrorResponse\Detail>")
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
