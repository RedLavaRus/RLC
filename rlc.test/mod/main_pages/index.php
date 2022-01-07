<?php

namespace Mod\Main_pages;

Class Index{
    
    public function start(){
        $page[]="linemenu";
        $page[]="display";
        $page[]="shop";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }
}