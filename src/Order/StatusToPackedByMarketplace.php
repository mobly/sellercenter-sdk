<?php namespace SellerCenter\SDK\Order;

use JMS\Serializer\Annotation as JMS;

/**
 * Class StatusToPackedByMarketplace
 *
 * @package SellerCenter\SDK\Order
 * @author Mangierre Martins
 * @JMS\XmlRoot("SuccessResponse")
 */
class StatusToPackedByMarketplace
{
    /**
     * @var \SellerCenter\SDK\Common\Api\Response\Success\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\Head")
     */
    protected $head;

    /**
     * @var StatusToPackedByMarketplace\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Order\StatusToPackedByMarketplace\Body")
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
     * @return StatusToPackedByMarketplace
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return StatusToPackedByMarketplace\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param StatusToPackedByMarketplace\Body $body
     *
     * @return StatusToPackedByMarketplace
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
