<?php

namespace Mod\test;

Class Test{
    public function test(){

       $sql = new \Mod\Ajax\Install; 
      // $grp = new \Mod\Group\Index;
       //$res_grp = $grp->add_user_to_group(1,"admin");
      //$res_grp = $grp->delete_group("user3");
      //var_dump( "<pre>",$res_grp);
        //new \Mod\User\Install;
        $id=1;
        $permission="admin";
        $test = new \Mod\Permission\Permission;
        $res = $test->go($permission);
        //var_dump($res);
        die();
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