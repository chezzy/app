<?php

namespace App;

class Model
{
    const TABLE = '';

    public $id;

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

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }

        $columns    = [];
        $values     = [];
        foreach ($this as $key => $val) {
            if ('id' === $key) {
                continue;
            }

            $columns[] = $key;
            $values[':'.$key] = $val;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(',', $columns) . ') VALUES ('. implode(',', array_keys($values)) .')';
        $db = Db::instance();
        $db->execute($sql, $values);
    }
}