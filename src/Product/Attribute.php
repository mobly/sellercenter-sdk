<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use SellerCenter\SDK\Common\ToXmlArrayInterface;

/**
 * Class ProductAttribute
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class Attribute implements ToArrayInterface, ToXmlArrayInterface
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
            throw new InvalidArgumentException('Invalid attribute name');
        }

        if (!empty($value) && !is_string($value)) {
            throw new InvalidArgumentException('Invalid attribute value');
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
     * @return Attribute
     */
    public function setName($name)
    {
        if (!is_string($name)) {
            throw new InvalidArgumentException(
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
     * @return Attribute
     */
    public function setValue($value)
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException(
                'Value is not a valid string, ' . gettype($value) . ' passed'
            );
        }

        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return [$this->getName() => $this->getValue()];
    }

    /**
     * {@inheritDoc}
     */
    public function toXmlArray()
    {
        return $this->toArray();
    }
}
