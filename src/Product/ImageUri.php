<?php namespace SellerCenter\SDK\Product;

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
     * @JMS\Accessor(getter="__toString",setter="setUri")
     */
    protected $uri;

    public function __construct($uri)
    {
        $this->setUri($uri);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->uri->toString();
    }

    /**
     * @param string $uri
     *
     * @return ImageUri
     */
    public function setUri($uri)
    {
        $this->uri = new Http($uri);

        if (!$this->uri->isAbsolute()) {
            throw new \InvalidArgumentException('Invalid image URL: ' . $this->uri->toString());
        }

        return $this;
    }
}
