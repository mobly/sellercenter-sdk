<?php namespace SellerCenter\SDK\Product;

use GuzzleHttp\Command\ToArrayInterface;

/**
 * Class Price
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class Price implements ToArrayInterface
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
            'SaleStartDate' => null,
            'SaleEndDate' => null,
        ];

        if ($this->saleStartDate instanceof \DateTime) {
            $data['SaleStartDate'] = $this->getSaleStartDate()->format(\DateTime::ISO8601);
        }

        if ($this->saleEndDate instanceof \DateTime) {
            $data['SaleEndDate'] = $this->getSaleEndDate()->format(\DateTime::ISO8601);
        }

        return $data;
    }
}
