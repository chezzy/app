<?php

namespace App;

class Db
{
    protected $dbh;

    function __construct()
    {
        $this->dbh = new \PDO('mysql:dbname=app;host=127.0.0.1', 'root', '');
    }

    public function execute($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();

        return $res;
    }
}