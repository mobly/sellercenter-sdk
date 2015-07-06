<?php

namespace SellerCenter\SDK\Product;

use SellerCenter\SDK\Common\SdkClient;
use SellerCenter\SDK\Product\Contract\ProductInterface;

/**
 * Class ProductClient
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
class ProductClient extends SdkClient implements ProductInterface
{
    /**
     * @var string
     */
    protected $action = 'Product';

    /**
     * @param \DateTime|null              $createdAt
     * @param \DateTime|null              $createdBefore
     * @param null                        $search
     * @param null|Enum\ProductFilterEnum $filter
     * @param null                        $limit
     * @param null                        $offset
     *
     * @return Products
     */
    public function getProducts(
        $search = null,
        Enum\ProductFilterEnum $filter = null,
        \DateTime $createdAt = null,
        \DateTime $createdBefore = null,
        $limit = null,
        $offset = null
    ) {
        $data = [];
        if (!empty($createdAt)) {
            $data['CreatedAfter'] = $createdAt->format(DATE_ISO8601);
        }
        if (!empty($createdBefore)) {
            $data['CreatedBefore'] = $createdBefore->format(DATE_ISO8601);
        }
        if (!empty($search)) {
            $data['Search'] = $search;
        }
        if (!empty($filter)) {
            $data['Filter'] = $filter->getValue();
        }
        if (!empty($limit) && is_int($limit) && $limit > 0) {
            $data['Limit'] = $limit;
        }
        if (!empty($offset) && is_int($offset) && $offset > -1) {
            $data['Offset'] = $offset;
        }

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productCreate(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productUpdate(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function productRemove(ProductCollection $collection)
    {
        $data = [
            'ProductRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }

    /**
     * @param ProductImageCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\SuccessResponse
     */
    public function image(ProductImageCollection $collection)
    {
        $data = [
            'ProductImageRequest' => $collection
        ];

        return $this->execute($this->getCommand(ucfirst(__FUNCTION__), $data));
    }
}
