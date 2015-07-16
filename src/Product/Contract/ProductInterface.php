<?php namespace SellerCenter\SDK\Product\Contract;

use DateTime;
use GuzzleHttp\Command\ServiceClientInterface;
use SellerCenter\SDK\Product\Api\GetProducts\Response;
use SellerCenter\SDK\Product\Enum\ProductFilterEnum;
use SellerCenter\SDK\Product\ProductCollection;
use SellerCenter\SDK\Product\ProductImageCollection;

/**
 * Product Interface
 *
 * @package SellerCenter\SDK\Product
 * @author  Daniel Costa
 */
interface ProductInterface extends ServiceClientInterface
{
    /**
     * @param DateTime|null          $createdAt
     * @param DateTime|null          $createdBefore
     * @param null                   $search
     * @param null|ProductFilterEnum $filter
     * @param null                   $limit
     * @param null                   $offset
     *
     * @return Response
     */
    public function getProducts(
        $search = null,
        ProductFilterEnum $filter = null,
        DateTime $createdAt = null,
        DateTime $createdBefore = null,
        $limit = null,
        $offset = null
    );

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productCreate(ProductCollection $collection);

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productUpdate(ProductCollection $collection);

    /**
     * @param ProductCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function productRemove(ProductCollection $collection);

    /**
     * @param ProductImageCollection $collection
     *
     * @return \SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
     */
    public function image(ProductImageCollection $collection);
}
