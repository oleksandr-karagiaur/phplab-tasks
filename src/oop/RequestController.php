<?php


class Request {

    public $query;
    public $request;
    public $server;
    public $cookies;
    public $session;

    public function __construct(array $query, array $request, array $server, array $cookies, array $session)
    {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
        $this->cookies = $cookies;
        $this->session = $session;
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

    public function get($key, $default = null)
    {
        $getArray = array_keys($this->query);
        $postArray = array_keys($this->request);
        if ((!in_array($key, $getArray)) && (!in_array($key, $postArray))) {
            return $default;
        } elseif (((in_array($key, $getArray) && in_array($key, $postArray))) || (in_array($key, $postArray))) {
            return $this->request[$key];
        } else {
            return $this->query[$key];
        }
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
        if (in_array($key, array_keys($this->query)) || in_array($key, array_keys($this->request))) {
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
        return json_decode(json_encode($this->cookies));
    }

    public function session()
    {
        return json_decode(json_encode($this->session));
    }

    // Returns $_GET array
    public function getArray()
    {
        return $this->query;
    }

    // Returns $_POST array
    public function postArray()
    {
        return $this->request;
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

    // Merges $_GET and $_POST arrays
    public function queryRequestMerged()
    {
        return array_merge($this->query, $this->request);
    }
}