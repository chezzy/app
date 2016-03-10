<?php

namespace App;

class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            __CLASS__
        );
    }
}