<?php namespace SellerCenter\SDK\Common\Api\Response\Success;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\HeadInterface;

/**
 * Class Head
 *
 * @package SellerCenter\SDK\Common\Api\Response\Success\SuccessResponse
 * @author Daniel Costa
 * @JMS\XmlRoot("Head")
 */
class Head implements HeadInterface
{
    /**
     * @var string
     * @JMS\SerializedName("RequestId")
     * @JMS\Type("string")
     */
    protected $requestId;

    /**
     * @var string
     * @JMS\SerializedName("RequestAction")
     * @JMS\Type("string")
     */
    protected $requestAction;

    /**
     * @var string
     * @JMS\SerializedName("ResponseType")
     * @JMS\Type("string")
     */
    protected $responseType;

    /**
     * @var \DateTime
     * @JMS\SerializedName("Timestamp")
     * @JMS\Type("DateTime")
     */
    protected $timestamp;

    /**
     * @var RequestParameters
     * @JMS\SerializedName("RequestParameters")
     * @JMS\Type("SellerCenter\SDK\Common\Api\Response\Success\RequestParameters")
     */
    protected $requestParameters;

    /**
     * @return string
     */
    public function getRequestAction()
    {
        return $this->requestAction;
    }

    /**
     * @param string $requestAction
     *
     * @return Head
     */
    public function setRequestAction($requestAction)
    {
        $this->requestAction = $requestAction;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     *
     * @return Head
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponseType()
    {
        return $this->responseType;
    }

    /**
     * @param string $responseType
     *
     * @return Head
     */
    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     *
     * @return Head
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return RequestParameters
     */
    public function getRequestParameters()
    {
        return $this->requestParameters;
    }

    /**
     * @param RequestParameters $requestParameters
     */
    public function setRequestParameters($requestParameters)
    {
        $this->requestParameters = $requestParameters;
    }
}
