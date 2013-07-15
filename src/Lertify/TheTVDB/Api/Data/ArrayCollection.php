<?php

namespace Lertify\TheTVDB\Api\Data;

use ArrayIterator;

/**
 * Class ArrayCollection
 */
class ArrayCollection implements CollectionInterface
{

    /**
     * Items of the collection.
     * @var array
     */
    protected $_items;

    /**
     * Create ArrayCollection.
     *
     * @param array $items collection items
     */
    public function __construct(array $items = array())
    {
        $this->_items = $items;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        if (isset($this->_items[$key])) {
            return $this->_items[$key];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function add($item)
    {
        $this->_items[] = $item;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        $this->_items[$key] = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        if (!isset($this->_items[$key])) {
            return null;
        }

        $item = $this->_items[$key];
        unset($this->_items[$key]);

        return $item;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->_items = array();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return key($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return current($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function first()
    {
        return reset($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        return next($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function last()
    {
        return end($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        return !$this->_items;
    }

    /**
     * {@inheritdoc}
     */
    public function hasKey($key)
    {
        return isset($this->_items[$key]);
    }

    /**
     * Get all keys of the collection items
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->_items);
    }

    /**
     * Get all values of the collection items
     * @return array
     */
    public function getValues()
    {
        return array_values($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return $this->_items;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_items);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->hasKey($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        if ( ! isset($offset)) {
            $this->add($value);
        }

        $this->set($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->_items);
    }

}
