<?php

namespace Mobly\SellerCenterSDK\Collection;

/**
 * Class UriCollectionTest
 *
 * @package Mobly\SellerCenterSDK\Collection
 * @author Daniel Costa
 */
class UriCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAddInvalidItemShouldThrowInvalidArgumentException()
    {
        $collection = new UriCollection;
        $collection->add(1);
    }
}
