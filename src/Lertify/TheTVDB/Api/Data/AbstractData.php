<?php

namespace Lertify\TheTVDB\Api\Data;

use Serializable, Exception;
use ReflectionProperty;

abstract class AbstractData
{

    public function __construct( $data = array() ) {
        if(!empty($data)) $this->fromArray( $data );
    }

    public function __call($key, $arguments) {
        if(method_exists($this, $key))
        {
            return call_user_func_array(array($this, $key), $arguments);
        }

        if (property_exists($this, $key)) {
            if(count($arguments) == 0)
                return $this->__get($key);
            elseif(count($arguments) == 1)
                return $this->__set($key, $arguments[0]);
        }

        if($key == 'set' && count($arguments) == 2) {
            return $this->__set($arguments[0], $arguments[1]);
        }

        if($key == 'get' && count($arguments) == 1) {
            return $this->__get($arguments[0]);
        }

        if(substr($key, 0, 3) == 'set' && count($arguments) == 1) {
            return $this->__set( lcfirst( substr($key, 3) ) , $arguments[0]);
        }

        if(substr($key, 0, 3) == 'get' && count($arguments) == 0) {
            return $this->__get( lcfirst( substr($key, 3) ) );
        }

        throw new Exception("Undefined method ".$key.".");
    }

    public function __set($key, $value)
    {
        $unc_key = $this->uncamelize($key);
        if (property_exists($this, $unc_key)) {
            $name = 'set' . $this->camelize($key);
            if (method_exists($this, $name))
                $this->{ $name }($value);
            else
                $this->{ $unc_key } = $value;
                //throw new Exception("Property '$key' is read-only.");
        } else {
            throw new Exception("Undefined property ".$key." (".$unc_key.").");
        }
        return $this;
    }

    public function __get($key)
    {
        $unc_key = $this->uncamelize($key);
        if (property_exists($this, $unc_key)) {
            $name = 'get' . $this->camelize($key);
            if (method_exists($this, $name))
                return $this->{ $name }();
            else
                return $this->{ $unc_key };
        } else {
            throw new Exception("Undefined property ".$key." (".$unc_key.").");
        }
    }

    public function toArray() {
        $values = get_object_vars($this);

        foreach($values AS $key => $value) {
            $prop = new ReflectionProperty($this, $key);
            if($prop->isProtected()) unset($values[$key]);
        }

        return $values;
    }

    public function fromArray( array $array ) {
        foreach($array AS $key => $value)
            $this->{$key} = $value;
        return $this;
    }

    private function camelize($word) {
        return preg_replace('/(^|_)([a-z])/e', 'strtoupper("\\2")', $word);
    }

    private function uncamelize($camel)
    {
        return strtolower( preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $camel) );
    }

}
