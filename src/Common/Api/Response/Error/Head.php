<?php namespace SellerCenter\SDK\Common\Api\Response\Error;

use JMS\Serializer\Annotation as JMS;
use SellerCenter\SDK\Common\Api\Response\HeadInterface;

/**
 * Class ErrorHead
 *
 * @package SellerCenter\SDK\Common\Api\Response\Error\ErrorResponse
 * @author Daniel Costa
 */
class Head implements HeadInterface
{
    /**
     * @var string
     * @JMS\SerializedName("RequestAction")
     * @JMS\Type("string")
     */
    protected $requestAction;

    /**
     * @var string
     * @JMS\SerializedName("ErrorType")
     * @JMS\Type("string")
     */
    protected $errorType;

    /**
     * @var int
     * @JMS\SerializedName("ErrorCode")
     * @JMS\Type("integer")
     */
    protected $errorCode;

    /**
     * @var string
     * @JMS\SerializedName("ErrorMessage")
     * @JMS\Type("string")
     */
    protected $errorMessage;

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
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * @param string $errorType
     *
     * @return Head
     */
    public function setErrorType($errorType)
    {
        $this->errorType = $errorType;

        return $this;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     *
     * @return Head
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     *
     * @return Head
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }
}
