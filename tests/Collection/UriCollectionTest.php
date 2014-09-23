<?php

namespace Mobly\SellerCenter\Collection;

/**
 * Class UriCollectionTest
 *
 * @package Mobly\SellerCenter\Collection
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
