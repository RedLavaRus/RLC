<?php

namespace Mod\test;

Class Test{
    public function test(){

        //new \Mod\User\Install;
        $data = array(
            array("var1","100"),
            array("var2","200"),
            array("var3","300"),
            array("var4","400"),
        );
        //echo $_SESSION["id"];
        $page[]="linemenu";
        $page[]="display";
        $page[]="shop";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page,$data);
    }

}