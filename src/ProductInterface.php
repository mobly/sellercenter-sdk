<?php

namespace SellerCenter\SDK;

/**
 * Product Interface
 *
 * @package SellerCenter\SDK
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
