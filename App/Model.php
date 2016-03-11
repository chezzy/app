<?php

namespace App;

class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            [],
            __CLASS__
        );
    }

    public static function findById($id = null)
    {
        if (null === $id)
            return false;

        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            [':id' => $id],
            __CLASS__
        )[0];
    }
}