<?php namespace SellerCenter\SDK\Product\CategoryAttribute;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Option
 *
 * @package SellerCenter\SDK\Product\CategoryAttribute
 * @author Daniel Costa
 */
class Option
{
    /**
     * @var string
     * @JMS\SerializedName("GlobalIdentifier")
     * @JMS\Type("string")
     */
    private $globalIdentifier;

    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var bool
     * @JMS\SerializedName("isDefault")
     * @JMS\Type("string")
     */
    private $isDefault;

    /**
     * @return string
     */
    public function getGlobalIdentifier()
    {
        return $this->globalIdentifier;
    }

    /**
     * @param string $globalIdentifier
     *
     * @return Option
     */
    public function setGlobalIdentifier($globalIdentifier)
    {
        $this->globalIdentifier = $globalIdentifier;

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
     * @return Option
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param boolean $isDefault
     *
     * @return Option
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }
}
