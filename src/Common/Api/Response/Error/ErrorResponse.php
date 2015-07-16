<?php namespace SellerCenter\SDK\Common\Api\Response\Error;

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
     * @var Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Error\Head")
     */
    protected $head;

    /**
     * @var Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Error\Body")
     */
    protected $body;

    /**
     * @return Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param Head $head
     *
     * @return ErrorResponse
     */
    public function setHead(Head $head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param Body $body
     *
     * @return ErrorResponse
     */
    public function setBody(Body $body)
    {
        $this->body = $body;

        return $this;
    }
}
