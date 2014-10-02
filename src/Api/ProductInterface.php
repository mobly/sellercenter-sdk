<?php

namespace Mobly\SellerCenterSDK\Api;

/**
 * Interface ProductInterface
 *
 * @package Mobly\SellerCenterSDK\Core
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
