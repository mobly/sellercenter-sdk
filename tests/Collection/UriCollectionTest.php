<?php

namespace SellerCenter\SDK\Collection;

/**
 * Class UriCollectionTest
 *
 * @package SellerCenter\SDK\Collection
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
