<?php namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Brand
 *
 * @package SellerCenter\SDK\Product
 * @author Daniel Costa
 */
class Brand implements ToArrayInterface
{
    /**
     * @var string
     * @JMS\SerializedName("Name")
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\SerializedName("GlobalIdentifier")
     * @JMS\Type("string")
     */
    private $globalIdentifier;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Brand
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getGlobalIdentifier()
    {
        return $this->globalIdentifier;
    }

    /**
     * @param string $globalIdentifier
     *
     * @return Brand
     */
    public function setGlobalIdentifier($globalIdentifier)
    {
        $this->globalIdentifier = $globalIdentifier;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'globalIdentifier' => $this->getGlobalIdentifier(),
            'name' => $this->getName(),
        ];
    }
}
