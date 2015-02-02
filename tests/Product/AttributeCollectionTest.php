<?php

namespace SellerCenter\Test\SDK\Product;

use SellerCenter\SDK\Product\Attribute;
use SellerCenter\SDK\Product\AttributeCollection;
use SellerCenter\Test\SDK\SdkTestCase;

/**
 * AttributeCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class AttributeCollectionTest extends SdkTestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new AttributeCollection();
        $collection->add(1);
    }

    public function testToArray()
    {
        $collection = new AttributeCollection;

        $attribute1 = new Attribute('name1', 'value1');
        $collection->add($attribute1);

        $attribute2 = new Attribute('name2', 'value2');
        $collection->add($attribute2);

        $expected = [
            'name1' => 'value1',
            'name2' => 'value2'
        ];
        $this->assertEquals($expected, $collection->toArray());
    }
}
