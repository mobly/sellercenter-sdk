<?php namespace SellerCenter\SDK\Common\Api\Response\Error;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ErrorBody
 *
 * @package SellerCenter\SDK\Common\Api\Response\Error\ErrorResponse
 * @author Daniel Costa
 */
class Detail
{
    /**
     * @var string
     * @JMS\SerializedName("Field")
     * @JMS\Type("string")
     */
    protected $field;

    /**
     * @var string
     * @JMS\SerializedName("Message")
     * @JMS\Type("string")
     */
    protected $message;

    /**
     * @var int
     * @JMS\SerializedName("Value")
     * @JMS\Type("string")
     */
    protected $value;

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     *
     * @return Detail
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return Detail
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return Detail
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
