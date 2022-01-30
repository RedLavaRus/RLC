<?php

namespace Mod\test;

Class Test{
    public function test(){

       //$sql = new \Mod\Ajax\Install; 
      // $grp = new \Mod\Group\Index;
       //$res_grp = $grp->add_user_to_group(1,"admin");
      //$res_grp = $grp->delete_group("user3");
      //var_dump( "<pre>",$res_grp);
        new \Mod\Blog\Install;
        $id=1;
        //$permission="admin";
        //$test = new \Mod\Permission\Permission;
        //$res = $test->go($permission);
        //var_dump($res);
        /*
        //echo $_SESSION["id"];
        $dir="news";
        $page[]="linemenu";

        $page1[]="news";//_all";
        $page1[]="small_news";
        $page1[]="calendar";

        $page3[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
        $view->view($dir,$page1);
        $view->show($page3);*/
    }

}