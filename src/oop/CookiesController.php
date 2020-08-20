<?php


class Cookies
{

    public $cookies;

    public function __construct(array $cookies)
    {
        $this->cookies = $cookies;
    }

    public function all(array $only = [])
    {
        if (isset($this->cookies)) {
            if (!empty($only)) {
                return array_keys($only);
            } else {
                return $this->cookies;
            }
        } else {
            echo 'There are no cookies set';
        }
    }

    public function get($key, $default = null)
    {
        if (isset($this->cookies)) {
            if (array_key_exists($key, $this->cookies)) {
                return $this->cookies[$key];
            } else {
                return $default;
            }
        } else {
            echo 'There are no cookies set';
        }
    }

    public function set($key, $value)
    {
        setcookie($key, $value);
    }

    public function has($key)
    {
        if (isset($this->cookies)) {
            if (in_array($key, array_keys($this->cookies))) {
                return true;
            } else {
                return false;
            }
        } else {
            echo 'There are no cookies set';
        }
    }

    public function remove($key)
    {
        if (isset($this->cookies)) {
            if (array_key_exists($key, $this->cookies)) {
                setcookie($key, '', time()-360);
            } else {
                echo 'No such cookie with this name was found';
            }
        } else {
            echo 'There are no cookies at all, so there is nothing to remove';
        }
    }
}