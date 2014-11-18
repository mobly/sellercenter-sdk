<?php

namespace SellerCenter\SDK\Product;

/**
 * AttributeCollection Test
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class AttributeCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new AttributeCollection();
        $collection->add(1);
    }
}
