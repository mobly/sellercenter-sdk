<?php

namespace Mobly\SellerCenter\Entity;

/**
 * Class ProductAttribute
 *
 * @package Mobly\SellerCenter\Entity
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
    public function __construct($name, $value)
    {
        if (!is_string($name)) {
            throw new \UnexpectedValueException('Invalid attribute name');
        }

        if (!is_string($value)) {
            throw new \UnexpectedValueException('Invalid attribute value');
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
        $this->value = $value;

        return $this;
    }
}
