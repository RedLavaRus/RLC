<?php

namespace Mod\Router;

Class Router{

    public $way = null; //Пусть fjdklf/ewew/ewewe/ewew
    public $parameter = null; //Параметры он же гет ?fjkd=ewe
    public $file; // Файл в djladj/ewqeqw/index.png он тут index.png

    public $get;
    public $post;

    public function __construct(){
        $this->way();
        $this->param();
        $this->get();
        $this->post();
        $this->start();
        $sql = new \Mod\Sql\Sql;
        var_dump("<pre>",$sql);
    }

    public function way(){
        $this->way = $_SERVER['REQUEST_URI'];
        $this->way = explode("?",$this->way);
        $this->way = $this->way[0];
        if(substr($this->way, -1) != "/") $this->reload_slash();
        return;
        
    }

    public function reload_slash(){
        $this->way .= "/";
    }

    public function param(){
        $this->parameter = $_GET;
        return;
    }

    public function get(){
        $this->get = $_GET;
    }

    public function post(){
        $this->post = $_POST;
    }

    public function start(){
        
        //Запрос        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `router` WHERE `url` = ?");
            $sth->execute(array($this->way));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        //Проверка на сущность
        if(!($result_sql["id"] >= 1)) {
            $this->e404();
            die();
        }
        //Вывод класс
        $class = $result_sql["class"];
        $funct = $result_sql["funct"];
        $result = new $class;
        $result->$funct();
    }
    public function e404(){
        echo "error 404: page don't faunt!";
    }
}