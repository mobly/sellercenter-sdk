<?php namespace SellerCenter\SDK\Common\Api\Parser;

use SellerCenter\SDK\Common\Api\Service;

/**
 * Class AbstractParser
 *
 * @package SellerCenter\SDK\Common\Api\Parser
 * @author  Daniel Costa
 */
abstract class AbstractParser
{
    /** @var Service Representation of the service API*/
    protected $api;

    /**
     * @param Service $api Service description
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }
}
