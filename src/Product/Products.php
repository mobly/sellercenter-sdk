<?php

namespace SellerCenter\SDK\Product;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Products
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 * @JMS\XmlRoot("SuccessResponse")
 */
class Products
{
    /**
     * @var \SellerCenter\SDK\Common\Api\SuccessResponse\Head
     * @JMS\SerializedName("Head")
     * @JMS\Type("SellerCenter\SDK\Common\Api\SuccessResponse\Head")
     */
    protected $head;

    /**
     * @var Products\Body
     * @JMS\SerializedName("Body")
     * @JMS\Type("SellerCenter\SDK\Product\Products\Body")
     */
    protected $body;

    /**
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse\Head
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param \SellerCenter\SDK\Common\Api\SuccessResponse\Head $head
     *
     * @return Products
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return Products\Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param Products\Body $body
     *
     * @return Products
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
