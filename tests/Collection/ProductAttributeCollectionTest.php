<?php

namespace Mobly\SellerCenterSDK\Collection;

/**
 * Class ProductAttributeCollectionTest
 *
 * @package Mobly\SellerCenterSDK\Collection
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
