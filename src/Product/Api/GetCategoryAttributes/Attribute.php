<?php namespace SellerCenter\SDK\Product\Api\GetCategoryAttributes;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Attribute
 *
 * @package SellerCenter\SDK\Product\Api\GetCategoryAttributes\AttributeCollection
 * @author Daniel Costa
 */
class Attribute
{
    /**
     * @var string
     * @JMS\SerializedName("Label")
     * @JMS\Type("string")
     */
    private $label;

    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\SerializedName("GlobalIdentifier")
     * @JMS\Type("string")
     */
    private $globalIdentifier;

    /**
     * @var bool
     * @JMS\SerializedName("isMandatory")
     * @JMS\Type("string")
     * @JMS\Accessor(getter="isMandatory",setter="setMandatory")
     */
    private $isMandatory;

    /**
     * @var string
     * @JMS\SerializedName("Description")
     * @JMS\Type("string")
     */
    private $Description;

    /**
     * @var string
     * @JMS\SerializedName("AttributeType")
     * @JMS\Type("string")
     */
    private $attributeType;

    /**
     * @var string
     * @JMS\SerializedName("ExampleValue")
     * @JMS\Type("string")
     */
    private $exampleValue;

    /**
     * @var ArrayCollection
     * @JMS\SerializedName("Options")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Api\GetCategoryAttributes\Option>")
     * @JMS\XmlList(entry="Option")
     */
    private $options;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return Attribute
     */
    public function setLabel($label)
    {
        $this->label = $label;

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
     * @return Attribute
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

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
     * @return Attribute
     */
    public function setGlobalIdentifier($globalIdentifier)
    {
        $this->globalIdentifier = $globalIdentifier;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isMandatory()
    {
        return $this->isMandatory;
    }

    /**
     * @param boolean $isMandatory
     *
     * @return Attribute
     */
    public function setMandatory($isMandatory)
    {
        $this->isMandatory = $isMandatory;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     *
     * @return Attribute
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttributeType()
    {
        return $this->attributeType;
    }

    /**
     * @param string $attributeType
     *
     * @return Attribute
     */
    public function setAttributeType($attributeType)
    {
        $this->attributeType = $attributeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getExampleValue()
    {
        return $this->exampleValue;
    }

    /**
     * @param string $exampleValue
     *
     * @return Attribute
     */
    public function setExampleValue($exampleValue)
    {
        $this->exampleValue = $exampleValue;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     *
     * @return Attribute
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }
}
