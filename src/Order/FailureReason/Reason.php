<?php

namespace SellerCenter\SDK\Order\FailureReason;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Reason
 *
 * @package SellerCenter\SDK\Order\FailureReason
 * @author Daniel Costa
 */
class Reason
{
    /**
     * @var string
     * @JMS\SerializedName("Type")
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Reason
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Reason
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
