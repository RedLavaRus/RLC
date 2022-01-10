<?php

namespace Mod\test;

Class Test{
    public function test(){

       //$sql = new \Mod\Group\Install; 
       $grp = new \Mod\Group\Index;
       $res_grp = $grp->add_group("user1","user1");
       $res_grp = $grp->add_group("user2","user2");
       $res_grp = $grp->list_group();
      //$res_grp = $grp->delete_group("user3");
      var_dump( "<pre>",$res_grp);
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