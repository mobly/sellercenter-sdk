<?php namespace SellerCenter\SDK\Feed\Api\GetFeedRawInput;

use JMS\Serializer\Annotation as JMS;

/**
 * Class RawInputFile
 *
 * @package SellerCenter\SDK\Feed\Api\GetFeedRawInput
 * @author Daniel Costa
 */
class RawInputFile
{
    /**
     * @var string
     * @JMS\SerializedName("MimeType")
     * @JMS\Type("string")
     */
    protected $mimeType;

    /**
     * @var string
     * @JMS\SerializedName("File")
     * @JMS\Type("string")
     */
    protected $file;

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     *
     * @return RawInputFile
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     *
     * @return RawInputFile
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}
