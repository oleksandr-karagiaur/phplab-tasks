<?php


class Session
{
    public $session;

    public function __construct(array $session)
    {
        $this->session = $session;
    }

    public function all(array $only = [])
    {
        if (isset($this->session)) {
            if (!empty($only)) {
                return array_keys($only);
            } else {
                return $this->session;
            }
        } else {
            echo 'No session set';
        }
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->session)) {
            return $this->session[$key];
        } else {
            return $default;
        }
    }

    public function set($key, $value) {
        if (isset($this->session)) {
            $this->session[$key] = $value;
        }
    }

    public function has($key)
    {
        if (isset($this->session)) {
            if (in_array($key, array_keys($this->session))) {
                return true;
            } else {
                return false;
            }
        } else {
            echo 'No session set';
        }
    }

    public function remove($key)
    {
        if (isset($this->session)) {
            if (array_key_exists($key, $this->session)) {
                unset($this->session[$key]);
            } else {
                echo 'No such session name was found';
            }
        }
    }

    public function clear()
    {
        session_unset();
        session_destroy();
    }
}