<?php


class Request {

    private $query;
    private $request;
    private $server;
    private $cookies;
    private $session;

    public function __construct()
    {
        $this->query = $_GET;
        $this->request = $_POST;
        $this->server = $_SERVER;
        $this->cookies = $_COOKIE;
        $this->session = $_SESSION;
    }


    public function query($key, $default = null)
    {
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    public function post($key, $default = null)
    {
        if (array_key_exists($key, $this->request)) {
            return $this->request[$key];
        } else {
            return $default;
        }
    }

    public function get($key)
    {
        if (isset($key) && $this->server['REQUEST_METHOD'] == 'POST') {
            return $this->post($key);
        } elseif (isset($key) && $this->server['REQUEST_METHOD'] == 'GET') {
            return $this->query($key);
        }
        return $key;
    }

    public function all(array $only = [])
    {
        $queryRequestMerged = array_merge($this->query, $this->request);
        if (!empty($only)) {
            return array_keys($only);
        } else {
            return $queryRequestMerged;
        }
    }

    public function has($key)
    {
        if ((array_key_exists($key, $this->query)) || (array_key_exists($key, $this->request))) {
            return true;
        } else {
            return false;
        }
    }

    public function ip()
    {
        return $this->server['REMOTE_ADDR'];
    }

    public function userAgent()
    {
        return $this->server['HTTP_USER_AGENT'];
    }

    public function cookies()
    {
        return json_decode(json_encode($this->cookies), FALSE);
    }

    public function session()
    {
        return json_decode(json_encode($this->session), FALSE);
    }

    public function sessionSet($key, $value) {
        if (isset($this->session)) {
            $this->session[$key] = $value;
        }
    }

    // Clears $_GET array
    public function clearQuery()
    {
        return $this->query = [];
    }

    // Clears $_POST array
    public function clearPost()
    {
        return $this->request = [];
    }
}