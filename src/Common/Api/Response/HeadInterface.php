<?php namespace SellerCenter\SDK\Common\Api\Response;

interface HeadInterface
{
    /**
     * @return string
     */
    public function getRequestAction();

    /**
     * @param string $requestAction
     *
     * @return HeadInterface
     */
    public function setRequestAction($requestAction);
}
