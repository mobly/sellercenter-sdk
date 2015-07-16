<?php namespace SellerCenter\SDK\Common\Exception;

use GuzzleHttp\Command\Exception\CommandException;

/**
 * Class SdkException
 *
 * @package SellerCenter\SDK\Exception
 * @author  Daniel Costa
 */
class SdkException extends CommandException
{
    /**
     * Gets the client that executed the command.
     *
     * @return \SellerCenter\SDK\Common\SdkClientInterface
     */
    public function getClient()
    {
        return $this->getTransaction()->serviceClient;
    }

    /**
     * Get the name of the web service that encountered the error.
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->getClient()->getApi()->getMetadata('serviceFullName');
    }

    /**
     * If available, gets the HTTP status code of the corresponding response
     *
     * @return int|null
     */
    public function getStatusCode()
    {
        return $this->getTransaction()->response->getStatusCode();
    }

    /**
     * Get the request ID of the error. This value is only present if a
     * response was received and is not present in the event of a networking
     * error.
     *
     * @return string|null Returns null if no response was received
     */
    public function getApiRequestId()
    {
        return $this->getTransaction()->context['api_error']['request_id'];
    }

    /**
     * Get the Api error type.
     *
     * @return string|null Returns null if no response was received
     */
    public function getApiErrorType()
    {
        return $this->getTransaction()->context['api_error']['type'];
    }

    /**
     * Get the Api error code.
     *
     * @return string|null Returns null if no response was received
     */
    public function getApiErrorCode()
    {
        return $this->getTransaction()->context['api_error']['code'];
    }

    /**
     * @deprecated Use getApiRequestId() instead
     */
    public function getRequestId()
    {
        return $this->getApiRequestId();
    }

    /**
     * @deprecated Use getApiErrorCode() instead
     */
    public function getExceptionCode()
    {
        return $this->getApiErrorCode();
    }

    /**
     * @deprecated Use getApiErrorType() instead
     */
    public function getExceptionType()
    {
        return $this->getApiErrorType();
    }
}
