<?php

namespace App;


trait Singleton
{
    protected static $instance = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}