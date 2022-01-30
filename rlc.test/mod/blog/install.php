<?php

namespace Mod\Blog;

Class Install {
    public function __construct(){
        echo 1;
        $sql_create = '
        CREATE TABLE news (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            heads VARCHAR(255)  NOT NULL, 
            texts TEXT , 
            img VARCHAR(255)  NOT NULL, 
            datecreat VARCHAR(255)  NOT NULL, 
            weiv int(9)  NOT NULL, 
            comment int(9)  NOT NULL, 
            shows VARCHAR(255)  NOT NULL,
            url VARCHAR(255)
           )
        ';
        $sql = new \Mod\Sql\Sql;
        $sql->db_connect->exec($sql_create);


        $sql_create1 = '
        CREATE TABLE news_comment (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            id_news VARCHAR(255) , 
            texts TEXT , 
            id_autor VARCHAR(255) , 
            datecreat VARCHAR(255) , 
            shows VARCHAR(255) 
           )
        ';
        $sql1 = new \Mod\Sql\Sql;
        $res = $sql1->db_connect->exec($sql_create1);
        var_dump($res);
    } 



}
