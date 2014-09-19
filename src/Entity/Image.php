<?php

namespace Mobly\SellerCenter\Entity;

use Zend\Uri\Uri;
use Mobly\SellerCenter\Collection\UrlCollection;

/**
 * Class Image
 *
 * @package Mobly\SellerCenter\Entity
 * @author  Daniel Costa
 */
class Image
{

    /**
     * @var string
     */
    protected $sellerSku;

    /**
     * @var UrlCollection
     */
    protected $images;

    /**
     * @var Uri
     */
    protected $image;
}
