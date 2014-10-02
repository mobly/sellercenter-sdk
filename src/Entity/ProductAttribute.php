<?php

namespace Mobly\SellerCenterSDK\Entity;

/**
 * Class ProductAttribute
 *
 * @package Mobly\SellerCenterSDK\Entity
 * @author  Daniel Costa
 */
class ProductAttribute
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name = null, $value = null)
    {
        if (!empty($name) && !is_string($name)) {
            throw new \InvalidArgumentException('Invalid attribute name');
        }

        if (!empty($value) && !is_string($value)) {
            throw new \InvalidArgumentException('Invalid attribute value');
        }

        $this->name = $name;
        $this->value = $value;
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
     * @return ProductAttribute
     */
    public function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException(
                'Name is not a valid string, ' . gettype($name) . ' passed'
            );
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return ProductAttribute
     */
    public function setValue($value)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException(
                'Value is not a valid string, ' . gettype($value) . ' passed'
            );
        }

        $this->value = $value;

        return $this;
    }
}
