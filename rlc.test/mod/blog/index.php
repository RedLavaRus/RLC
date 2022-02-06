<?php

namespace Mod\Blog;

Class Index{
    public $start;
    public $end;
    public $stop;
    public function index(){
        
    }
    public function show_news_all(){

        $this_page =$this->num_page_news();//текущая страница
        $db = $this->lust_page_news($this_page);//выводит список новостей на этой странице
        if($db == null){
            $this->e404();
        }
        $page_dox = $this->page_down_line($this_page);
        $data_min = $this->blog_right_menu();
        

        $dir="news";
        $page[]="linemenu";

        $page1[]="news_all";
        $page1[]="small_news";
        $page1[]="calendar";

        $page3[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
        $view->view_line($dir,$page1,$db,$page_dox,$this->start,$this->end,$this->stop,$this_page,$data_min);
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

    public function down_page_generator($this_page){
        $full_list_page = $this->full_list();
    }

    public function full_list(){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT COUNT(*) FROM `news` WHERE `shows` = 'yes' ");
            $sth->execute(array());
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            $max_page = $result_sql["COUNT(*)"] /10;
            return ceil($max_page);            
    }

    public function page_down_line($this_page){

        $full_list = $this->full_list();
        $page_list = $this->max_in_this_page($full_list,$this_page);//список соседних страниц
        return $page_list;
    }

    public function max_in_this_page($full_list,$this_page){
        $group_page = ceil($this_page/6);
        $start = (($group_page-1)*6)+1;
        $end = $group_page*6;
       
        if($end < $full_list) {
            $end = $end;
            
            $this->stop = "no";
        }else{
            $end =  $full_list;
            $this->stop = "yes";
        }
        $this->start = $start;
        $this->end = $end;
        $res = null;
        while($start <= $end ){
            $res[] =$start ;
            $start ++;
        }
        
        return $res;

    }

    public function blog_right_menu(){
       
            
            $sql = new \Mod\Sql\Sql;
            $connect = $sql->db_connect;
                $sth = $connect->prepare("SELECT * FROM `news` WHERE `shows` = 'yes' ORDER BY weiv DESC LIMIT 2 ");// WHERE `shows` = 'yes' LIMIT 10 OFFSET ?");
                $sth->execute(array());
            
                $bd = null;
            while($result_sql = $sth->fetch(\PDO::FETCH_ASSOC)){
                $bd[] = $result_sql;
            }
            return $bd;
        
    }
            
}