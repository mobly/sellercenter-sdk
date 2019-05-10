<?php namespace SellerCenter\SDK\Common;

use ArrayAccess;
use Countable;
use GuzzleHttp\Command\ToArrayInterface;
use IteratorAggregate;

/**
 * Interface ResultInterface
 *
 * @package SellerCenter\SDK\Common
 * @author Daniel Costa
 */
interface ResultInterface extends ArrayAccess, IteratorAggregate, Countable, ToArrayInterface
{
    /**
     * Get an element from the model using path notation.
     *
     * @param string $path Path to the data to retrieve
     *
     * @return mixed|null Returns the result or null if the path is not found
     */
    public function getPath($path);

    /**
     * Check if the model contains a key by name
     *
     * @param string $name Name of the key to retrieve
     *
     * @return bool
     */
    public function hasKey($name);

    /**
     * Get a specific key value from the result model.
     *
     * @param string $key Key to retrieve.
     *
     * @return mixed|null Value of the key or NULL if not found.
     */
    public function get($key);

    /**
     * Provides debug information about the result object
     *
     * @return string
     */
    public function __toString();
}
