<?php

namespace Lertify\TheTVDB\Api\Data;

use Countable, IteratorAggregate, ArrayAccess;

/**
 * Class CollectionInterface
 * @package Lertify\TheTVDB\Api\Data
 * @description Collection interface
 */
interface CollectionInterface extends Countable, IteratorAggregate, ArrayAccess
{

    /**
     * Get item
     *
     * @param $key
     * @return mixed
     */
    function get($key);

    /**
     * Add item
     *
     * @param $item
     * @return self
     */
    function add($item);

    /**
     * Set item by key
     *
     * @param $key
     * @param $value
     * @return self
     */
    function set($key, $value);

    /**
     * Remove item
     *
     * @param $key
     * @return mixed
     */
    function remove($key);

    /**
     * Clear collection
     *
     * @return self
     */
    function clear();

    /**
     * Get current key
     *
     * @return mixed
     */
    function key();

    /**
     * Get current item
     *
     * @return mixed
     */
    function current();

    /**
     * Get first item
     *
     * @return mixed
     */
    function first();

    /**
     * Get next item
     *
     * @return mixed
     */
    function next();

    /**
     * Get last item
     *
     * @return mixed
     */
    function last();

    /**
     * Is collection empty
     *
     * @return boolean
     */
    function isEmpty();

    /**
     * Check if key exists
     *
     * @param $key
     * @return mixed
     */
    function hasKey($key);

    /**
     * Get array
     *
     * @return array
     */
    function toArray();

}
