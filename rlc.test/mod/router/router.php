<?php

namespace Mod\Router;

Class Router{

    public $way = null; //Пусть fjdklf/ewew/ewewe/ewew
    public $parameter = null; //Параметры он же гет ?fjkd=ewe
    public $anchor; // Якоть он же #klkl
    public $file; // Файл в djladj/ewqeqw/index.png он тут index.png

    public $get;
    public $post;

    public function __construct(){
        $this->way();
        $this->parram();
        var_dump($this);
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

    public function parram(){
        
    }
}