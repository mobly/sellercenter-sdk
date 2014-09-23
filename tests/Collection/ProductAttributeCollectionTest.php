<?php

namespace Mobly\SellerCenter\Collection;

/**
 * Class ProductAttributeCollectionTest
 *
 * @package Mobly\SellerCenter\Collection
 * @author Daniel Costa
 */
class ProductAttributeCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new ProductAttributeCollection();
        $collection->add(1);
    }
}
