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
        var_dump("<pre>",$this);
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
}