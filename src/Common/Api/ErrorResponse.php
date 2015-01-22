<?php

namespace SellerCenter\SDK\Common\Api;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ErrorResponse
 *
 * @package SellerCenter\SDK\Common\Api
 * @author Daniel Costa
 * @JMS\XmlRoot("ErrorResponse")
 */
class ErrorResponse
{
    /**
     * @var ErrorResponse\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\ErrorResponse\Head")
     */
    protected $head;

    /**
     * @var ErrorResponse\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Common\Api\ErrorResponse\Body")
     */
    protected $body;

    /**
     * @return ErrorResponse\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param ErrorResponse\Head $head
     *
     * @return ErrorResponse
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return ErrorResponse\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param ErrorResponse\Body $body
     *
     * @return ErrorResponse
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
