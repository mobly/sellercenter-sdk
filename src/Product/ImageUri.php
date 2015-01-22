<?php

namespace SellerCenter\SDK\Product;

use Zend\Uri\Http;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ImageUri
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 * @JMS\XmlRoot("Image")
 */
class ImageUri
{
    /**
     * @var Http
     * @JMS\XmlValue
     */
    protected $uri;

    public function __construct($uri)
    {
        $this->setUri($uri);
    }

    /**
     * @return Http
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param Http $uri
     *
     * @return ImageUri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return (string) $this->uri;
    }
}
