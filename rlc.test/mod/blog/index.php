<?php

namespace Mod\Blog;

Class Index{
    public function index(){

        
    }
    public function show_news_all(){
        $dir="news";
        $page[]="linemenu";

        $page1[]="news_all";
        $page1[]="small_news";
        $page1[]="calendar";

        $page3[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
        $view->view($dir,$page1);
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