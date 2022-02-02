<?php

namespace Mod\Blog;

Class Index{
    public function index(){

        
    }
    public function show_news_all(){

        $position = 1;
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `news` WHERE `shows` = 'yes' LIMIT 10 OFFSET ".$position." ");// WHERE `shows` = 'yes' LIMIT 10 OFFSET ?");
            $sth->execute(array($position));
        
            $bd = null;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            $bd[] = $result_sql;
        }
        


        $dir="news";
        $page[]="linemenu";

        $page1[]="news_all";
        $page1[]="small_news";
        $page1[]="calendar";

        $page3[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
        $view->view_line($dir,$page1,$bd);
        $view->show($page3);
    }
    public function show_news_one(){
        $dir="news";
        $page[]="linemenu";

        $page1[]="news";
        $page1[]="small_news";
        $page1[]="calendar";

        $page3[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
        $view->view($dir,$page1);
        $view->show($page3);
    }
}