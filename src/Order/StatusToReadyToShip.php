<?php namespace SellerCenter\SDK\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class StatusToReadyToShip
 *
 * @package SellerCenter\SDK\Order
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class StatusToReadyToShip
{
    /**
     * @var \SellerCenter\SDK\Common\Api\Response\Success\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var StatusToReadyToShip\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Order\StatusToReadyToShip\Body")
     */
    protected $body;

    /**
     * @return \SellerCenter\SDK\Common\Api\Response\Success\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param \SellerCenter\SDK\Common\Api\Response\Success\Head $head
     *
     * @return StatusToReadyToShip
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return StatusToReadyToShip\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param StatusToReadyToShip\Body $body
     *
     * @return StatusToReadyToShip
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
