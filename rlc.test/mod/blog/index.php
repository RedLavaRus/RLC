<?php

namespace Mod\Blog;

Class Index{
    public function index(){

        
    }
    public function show_news_all(){

       // echo ">>>>>>>>>>>>>".$this->num_page_news();
        $db = $this->lust_page_news($this->num_page_news());
        if($db == null){
            $this->e404();
        }
        


        $dir="news";
        $page[]="linemenu";

        $page1[]="news_all";
        $page1[]="small_news";
        $page1[]="calendar";

        $page3[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
        $view->view_line($dir,$page1,$db);
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

    public function show_lust_news($col = 2){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `news` WHERE `shows` = 'yes' LIMIT ".$col." OFFSET ORDER BY `id` ");// WHERE `shows` = 'yes' LIMIT 10 OFFSET ?");
            
        
            $bd = null;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            $bd[] = $result_sql;
        }
        return $bd;
    }

    public function lust_page_news($num_page = 1){
        $num_page = $num_page - 1;
        $position = $num_page * 10;
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `news` WHERE `shows` = 'yes' LIMIT 10 OFFSET ".$position." ");// WHERE `shows` = 'yes' LIMIT 10 OFFSET ?");
            $sth->execute(array($position));
        
            $bd = null;
        while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
            $bd[] = $result_sql;
        }
        return $bd;
    }

    public function num_page_news(){
        
        if(isset($_GET["page"]) and $_GET["page"] >1 ) {
            $page = $_GET["page"];
        }
        else{
            $page = 1;
        }
        return $page;
    }
    public function e404(){
        echo "error 404: page don't faunt!!!";
        die();
    }
}