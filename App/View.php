<?php

namespace App;


class View
    implements Countable, Iterator
{
    protected $path;
    protected $data = [];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function count()
    {
        return count($this->data);
    }

    public function render($template, $data = [], $return = false)
    {
        foreach ($this->data as $k => $v) {
            $$k = $v;
        }

        ob_start();
        include($this->path . '/' . $template . '.php');
        $content = ob_get_contents();
        ob_end_clean();

        if ($return) {
            return $content;
        }

        echo $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return false !== current($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}