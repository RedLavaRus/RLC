<?php

namespace Mod\Group;

Class Install {
    public function __construct(){
        $sql_create = '
        CREATE TABLE grp (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            grp VARCHAR(255) NOT NULL, 
            name VARCHAR(255) NOT NULL
           )
        ';
        $sql = new \Mod\Sql\Sql;
        $sql->db_connect->exec($sql_create);

        $sql_create2 = '
        CREATE TABLE grp_user (
            id INT(11) UNSIGNED NOT NULL ,
            PRIMARY KEY(id),
            grp VARCHAR(255) NOT NULL
           )
        ';
        $sql2 = new \Mod\Sql\Sql;
        $sql2->db_connect->exec($sql_create2);
    } 


}
