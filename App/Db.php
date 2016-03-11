<?php

namespace App;

class Db extends Singleton
{
    protected $dbh;

    protected function __construct()
    {
        $this->connect();
    }
        
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        return $res;
    }

    public function query($sql, $params, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        
        return [];
    }

    private function connect()
    {
        $this->dbh = new \PDO('mysql:dbname=app;host=127.0.0.1', 'root', '');
    }
}