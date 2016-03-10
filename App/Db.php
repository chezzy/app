<?php

namespace App;

class Db
{
    protected $dbh;

    function __construct()
    {
        $this->connect();
    }
        
    public function execute($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();

        return $res;
    }

    public function query($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        if (false !== $res) {
            return $sth->fetchAll();
        }
        
        return [];
    }

    private function connect()
    {
        $this->dbh = new \PDO('mysql:dbname=app;host=127.0.0.1', 'root', '');
    }
}