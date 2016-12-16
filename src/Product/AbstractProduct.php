<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use InvalidArgumentException;
use LengthException;
use OverflowException;
use RuntimeException;
use JMS\Serializer\Annotation as JMS;

abstract class AbstractProduct implements ToArrayInterface
{
    use SellerSkuTrait;
}
