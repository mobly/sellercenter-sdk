<?php

namespace SellerCenter\SDK\Product;

use GuzzleHttp\ToArrayInterface;
use SellerCenter\SDK\Common\ToXmlArrayInterface;

/**
 * Class Price
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class Price implements ToArrayInterface, ToXmlArrayInterface
{
    use SellerSkuTrait;

    use PriceTrait;

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $data = [
            'SellerSku' => $this->getSellerSku(),
            'Price' => $this->getPrice(),
            'SalePrice' => $this->getSalePrice(),
            'SaleFromDate' => null,
            'SaleToDate' => null,
        ];

        if ($this->saleStartDate instanceof \DateTime) {
            $data['SaleFromDate'] = $this->getSaleStartDate()->format(\DateTime::ISO8601);
        }

        if ($this->saleEndDate instanceof \DateTime) {
            $data['SaleToDate'] = $this->getSaleEndDate()->format(\DateTime::ISO8601);
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function toXmlArray()
    {
        $data = [
            'Price' => $this->toArray()
        ];

        return $data;
    }
}
