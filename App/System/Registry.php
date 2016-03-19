<?php

namespace App\System;


abstract class Registry
{
    abstract protected function get($key);
    abstract protected function set($key, $value);
}