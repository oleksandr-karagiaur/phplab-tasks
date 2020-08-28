<?php


class Cookies
{

    private $cookies;
    private $server;

    public function __construct()
    {
        $this->cookies = $_COOKIE;
        $this->server = $_SERVER;
    }

    public function all(array $only = [])
    {
        if (!empty($only)) {
            return array_keys($only);
        } else {
            return $this->cookies;
        }
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->cookies)) {
            return $this->cookies[$key];
        } else {
            return $default;
        }
    }

    public function set($key, $value)
    {
        setcookie($key, $value);
    }

    public function has($key)
    {
        return array_key_exists($key, $this->cookies) ? true : false;
    }

    public function remove($key)
    {
        if (array_key_exists($key, $this->cookies)) {
            setcookie($key, '', time() - 360);
        } else {
            return null;
        }
    }

    public function clearAllCookies()
    {
        $cookiesServer = $this->server['HTTP_COOKIE'];
        if (isset($cookiesServer)) {
            $cookies = explode(';', $cookiesServer);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
    }
}