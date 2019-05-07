<?php namespace SellerCenter\SDK\Product\Api\GetBrands;

use GuzzleHttp\Command\ToArrayInterface;
use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Product\BrandCollection;

/**
 * Class Body
 *
 * @package SellerCenter\SDK\Product\Api\GetBrands
 * @author Daniel Costa
 */
class Body extends \SellerCenter\SDK\Common\Api\Response\Success\Body implements ToArrayInterface
{
    /**
     * @var BrandCollection
     * @JMS\SerializedName("Brands")
     * @JMS\Type("ArrayCollection<SellerCenter\SDK\Product\Brand>")
     * @JMS\XmlList(entry="Brand")
     */
    protected $brands;

    /**
     * @return BrandCollection
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * @param BrandCollection $brands
     *
     * @return Body
     */
    public function setBrands($brands)
    {
        $this->brands = $brands;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->brands->toArray();
    }
}
