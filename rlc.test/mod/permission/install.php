<?php

namespace Mod\Permission;

Class Install {
    public function __construct(){
        $sql_create = '
        CREATE TABLE pex_user (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            user_id VARCHAR(255) NOT NULL, 
            pex text NOT NULL
           )
        ';
        $sql = new \Mod\Sql\Sql;
        $sql->db_connect->exec($sql_create);

        
        $sql_create2 = '
        CREATE TABLE pex_grp (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            grp_id VARCHAR(255) NOT NULL, 
            pex text NOT NULL
           )
        ';
        $sql2 = new \Mod\Sql\Sql;
        $sql2->db_connect->exec($sql_create2);
    } 

}
