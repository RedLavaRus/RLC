<?php

namespace Mod\User;

Class Install{
    public function __construct(){
        $sql_create = '
        CREATE TABLE user (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            login VARCHAR(255) NOT NULL, 
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL,
            datereg VARCHAR(255) NOT NULL,
            ipreg VARCHAR(255) NOT NULL,
            dateauth VARCHAR(255) NOT NULL,
            ipauth VARCHAR(255) NOT NULL
           )
        ';
        $sql = new \Mod\Sql\Sql;
        $sql->db_connect->exec($sql_create);
    } 
}