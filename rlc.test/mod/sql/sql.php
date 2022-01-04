<?php

namespace Mod\Sql;

Class Sql extends \PDO{
    public $db_connect;

    public function __construct(){
        $cfg =  new \Mod\Sql\Config;
        $this->db_connect = new \PDO('mysql:host='.$cfg->host.';dbname='.$cfg->detabase, $cfg->login, $cfg->pass);
        return;
    }
}