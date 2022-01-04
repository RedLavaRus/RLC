<?php

namespace Mod\Router;

Class Install {
    public function __construct(){
        $sql_create = '
        CREATE TABLE router (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            url VARCHAR(255) NOT NULL, 
            class VARCHAR(255) NOT NULL,
            funct VARCHAR(255) NOT NULL
           )
        ';
        $sql = new \Mod\Sql\Sql;
        $sql->db_connect->exec($sql_create);
    } 


}
