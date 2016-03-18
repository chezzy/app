<?php

namespace App;


class Config
{
    protected static $instance = null;
    private $config = [];

    protected function __construct() { }
    protected function __clone() { }

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function set($key, $val)
    {
        $this->config[$key] = $val;
    }

    public function get($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        return false;
    }
}