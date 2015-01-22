<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\Attribute;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * Attribute Test
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class AttributeTest extends SdkTestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorWithInvalidNameArgumentShouldThrowInvalidArgumentException()
    {
        new Attribute(1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorWithInvalidValueArgumentShouldThrowInvalidArgumentException()
    {
        new Attribute('attribute_name', 1);
    }

    public function testSetGetName()
    {
        $attribute = new Attribute();
        $attribute->setName('attribute_name');
        $this->assertAttributeEquals('attribute_name', 'name', $attribute);
        $this->assertEquals('attribute_name', $attribute->getName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidNameShouldThrowInvalidArgumentException()
    {
        $product = new Attribute;
        $product->setName(1);
    }

    public function testSetGetValue()
    {
        $attribute = new Attribute();
        $attribute->setValue('attribute_value');
        $this->assertAttributeEquals('attribute_value', 'value', $attribute);
        $this->assertEquals('attribute_value', $attribute->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidValueShouldThrowInvalidArgumentException()
    {
        $product = new Attribute;
        $product->setValue(1);
    }

    public function testToArray()
    {
        $attribute = new Attribute('attr_name', 'attr_value');
        $expected = ['attr_name' => 'attr_value'];
        $this->assertEquals($expected, $attribute->toArray());
    }
}
