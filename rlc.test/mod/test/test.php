<?php

namespace Mod\test;

Class Test{
    public function test(){
        $page[]="linemenu";
        $page[]="display";
        $page[]="shop";
        $page[]="footer";
        $page[]="footer1";
        $view = new \Mod\View\View;
        $view->show($page);
    }

}