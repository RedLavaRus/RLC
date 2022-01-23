<?php

namespace Mod\Admin;

Class Menu{
    //заказы
    public function el1(){
        $page[]="orders";
        $dir = "admin";
        $view = new \Mod\View\View;
        $view->view($dir,$page);
    }
    //магазин
    public function el2(){
        $page[]="shop";
        $dir = "admin";
        $view = new \Mod\View\View;
        $view->view($dir,$page);
    }
    //пользователь
    public function el3(){
        $page[]="user";
        $dir = "admin";
        $view = new \Mod\View\View;
        $view->view($dir,$page);
    }
    //настройки
    public function el4(){
        $page[]="setting";
        $dir = "admin";
        $view = new \Mod\View\View;
        $view->view($dir,$page);
    }
    //маркетплейс
    public function el5(){
        $page[]="marketplase";
        $dir = "admin";
        $view = new \Mod\View\View;
        $view->view($dir,$page);
    }
}