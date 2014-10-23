<?php

namespace SellerCenter\SDK\Exception;

/**
 * Interface SdkExceptionInterface
 *
 * @package SellerCenter\SDK\Exception
 * @author  Daniel Costa
 */
interface SdkExceptionInterface
{
    public function getCode();
    public function getLine();
    public function getFile();
    public function getMessage();
    public function getPrevious();
    public function getTrace();
}
