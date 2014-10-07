<?php

namespace SellerCenter\SDK\Collection;

/**
 * Class ProductAttributeCollectionTest
 *
 * @package SellerCenter\SDK\Collection
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
