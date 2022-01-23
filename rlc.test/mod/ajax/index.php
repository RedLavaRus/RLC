<?php

namespace Mod\Ajax;

Class Index{
    public function index(){
        $action = $_GET["act"];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `ajax` WHERE `action` = ?");
            $sth->execute(array($action));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        //Проверка на сущность


        $class = $result_sql["class"];
        $funct = $result_sql["funct"];
        $result = new $class;
        $result->$funct();
        
    }
    /*
    Заказы orders
    магазин shop
    пользователи user
    настройки settiongs
    помощь help
    */
}