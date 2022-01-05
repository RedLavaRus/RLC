<?php

namespace Mod\test;

Class Test{
    public function test(){

        //new \Mod\User\Install;


        $page[]="linemenu";
        $page[]="display";
        $page[]="shop";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }

}