<?php


class Session
{
    private $session;

    public function __construct()
    {
        $this->session = $_SESSION;
    }

    public function all(array $only = [])
    {
        if (!empty($only)) {
            return array_keys($only);
        } else {
            return $this->session;
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
        if (in_array($key, array_keys($this->session))) {
            return true;
        } else {
            return false;
        }
    }

    public function remove($key)
    {
        if (array_key_exists($key, $this->session)) {
            unset($this->session[$key]);
        }
    }

    public function clear() {
        session_unset();
        session_destroy();
    }
}