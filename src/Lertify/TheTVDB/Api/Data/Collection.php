<?php

namespace Lertify\TheTVDB\Api\Data;

use Countable, IteratorAggregate, ArrayAccess;

interface Collection extends Countable, IteratorAggregate, ArrayAccess
{

    function get($key);
    function add($item);
    function set($key, $value);
    function remove($key);
    function clear();
    function key();
    function current();
    function first();
    function next();
    function last();
    function isEmpty();
    function hasKey($key);
    function toArray();

}
