<?php namespace SellerCenter\SDK\Common\Credentials;

use \InvalidArgumentException;
use SellerCenter\SDK\Common\Enum\ConfigEnum;

/**
 * Basic implementation of the SellerCenter API credentials that
 * allows callers to pass in the API key in the constructor
 *
 * @package SellerCenter\SDK\Common\Credentials
 * @author  Daniel Costa
 */
class Credentials implements CredentialsInterface
{
    /**
     * SellerCenter API Key
     *
     * @var string with 40 characters
     */
    protected $key;

    /**
     * SellerCenter API User ID
     *
     * @var string
     */
    protected $id;

    /**
     * Get the available keys for the factory method
     *
     * @return array
     */
    public static function getConfigDefaults()
    {
        return array(
            ConfigEnum::KEY => null,
            ConfigEnum::ID => null,
        );
    }

    /**
     * Factory method for creating new credentials
     *
     * This factory method will create the appropriate credentials object with appropriate decorators
     * based on the passed configuration options
     *
     * @static
     *
     * @param array $config Options to use when instantiating the credentials
     *
     * @return CredentialsInterface
     * @throws InvalidArgumentException
     */
    public static function factory(array $config = array())
    {
        // Add default key values
        $config = array_intersect_key($config, self::getConfigDefaults(), array_merge(self::getConfigDefaults()));

        // Use explicitly configured credentials, if provided
        if (isset($config[ConfigEnum::ID]) && isset($config[ConfigEnum::KEY])) {
            return new self(
                $config[ConfigEnum::ID],
                $config[ConfigEnum::KEY]
            );
        }

        return new NullCredentials();
    }

    /**
     * @param $id
     * @param $key
     *
     * @throws InvalidArgumentException
     */
    public function __construct($id, $key)
    {
        $this->setId($id);
        $this->setKey($key);
    }

    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the API key
     *
     * @param string $key
     *
     * @return CredentialsInterface
     * @throws InvalidArgumentException
     */
    public function setKey($key)
    {
        if (!is_string($key) || strlen($key) != 40) {
            throw new InvalidArgumentException('API key should be a string with 40 characters');
        }

        $this->key = $key;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the API User ID
     *
     * @param string $id
     *
     * @return CredentialsInterface
     * @throws InvalidArgumentException
     */
    public function setId($id)
    {
        if (!is_string($id) || filter_var($id, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException('API User ID should be a valid email');
        }

        $this->id = $id;

        return $this;
    }

    public function toArray()
    {
        return [
            ConfigEnum::ID => $this->id,
            ConfigEnum::KEY => $this->key
        ];
    }
}
