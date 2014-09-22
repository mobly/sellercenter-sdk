<?php

namespace Mobly\SellerCenter\Entity;

/**
 * Class ProductTest
 *
 * @package Mobly\SellerCenter\Entity
 * @author  Daniel Costa
 */
class ProductAttributeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorWithInvalidNameArgumentShouldThrowInvalidArgumentException()
    {
        new ProductAttribute(1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorWithInvalidValueArgumentShouldThrowInvalidArgumentException()
    {
        new ProductAttribute('attribute_name', 1);
    }

    public function testSetGetName()
    {
        $productAttribute = new ProductAttribute();
        $productAttribute->setName('attribute_name');
        $this->assertAttributeEquals('attribute_name', 'name', $productAttribute);
        $this->assertEquals('attribute_name', $productAttribute->getName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidNameShouldThrowInvalidArgumentException()
    {
        $product = new ProductAttribute;
        $product->setName(1);
    }

    public function testSetGetValue()
    {
        $productAttribute = new ProductAttribute();
        $productAttribute->setValue('attribute_value');
        $this->assertAttributeEquals('attribute_value', 'value', $productAttribute);
        $this->assertEquals('attribute_value', $productAttribute->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidValueShouldThrowInvalidArgumentException()
    {
        $product = new ProductAttribute;
        $product->setValue(1);
    }
}
