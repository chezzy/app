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

    public function setConfig($key, $val)
    {
        $this->config[$key] = $val;
    }

    public function getConfig($key)
    {
        return $this->config[$key];
    }
}