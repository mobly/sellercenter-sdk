<?php

namespace SellerCenter\SDK\Common\Api;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SuccessResponse
 *
 * @package SellerCenter\SDK\Common\Api
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class SuccessResponse
{
    /**
     * @var SuccessResponse\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\SuccessResponse\Head")
     */
    protected $head;

    /**
     * @var SuccessResponse\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Common\Api\ErrorResponse\Body")
     */
    protected $body;

    /**
     * @return SuccessResponse\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param SuccessResponse\Head $head
     *
     * @return ErrorResponse
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return SuccessResponse\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param SuccessResponse\Body $body
     *
     * @return ErrorResponse
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
