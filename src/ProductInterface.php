<?php

namespace Mobly\SellerCenter;

/**
 * Interface ProductInterface
 *
 * @package Mobly\SellerCenter\Core
 * @author  Daniel Costa
 */
interface ProductInterface
{
    public function price();

    public function image();

    public function productAdd();

    public function productUpdate();

    public function productRemove();
}
