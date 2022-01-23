<?php

namespace Mod\Admin;

Class Admin{
    public function index(){
        
        $page[]="headadmin";
        $page[]="bodyadmin";
        $view = new \Mod\View\View;
        $view->show($page);
    }
    /*
    Заказы orders
    магазин shop
    пользователи user
    настройки settiongs
    помощь help
    */
}