<?php

namespace Mod\Sql;

Class Sql{
    public $db;

    public function __construct(){
        $cfg =  new \Mod\Sql\Config;
        $this->db = new \PDO('mysql:host=localhost;dbname=pdo', 'root', 'password');
    }
}