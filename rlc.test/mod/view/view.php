<?php

namespace Mod\View;

Class View{
    public function show_old($page){
        $conf = new \Mod\View\Config;
        $thems = $conf->thems;
        foreach($page as $p){
            $file_name = MYPOS.'\inter\thems\\'.$thems."\\".$p.".php";  
                 
            //Проверка на существование файла
            if (file_exists($file_name)) {
                include  $file_name;
            }else{
                $log = new \Mod\Logs\Logs;
                $m = "Не найдет файл: ".$file_name;
                $log->loging("view", $m);
            }
        }
    }
    /*
        
    */
    public function show($page,$data = null){
        if($data != null){
            foreach($data as $d){
                $var_name = $d[0];
                $var_value = $d[1];
                $$var_name = $var_value;
            }
        }

        $conf = new \Mod\View\Config;
        $thems = $conf->thems;
        foreach($page as $p){
            $file_name = MYPOS.'\inter\thems\\'.$thems."\\".$p.".php";  
                 
            //Проверка на существование файла
            if (file_exists($file_name)) {
                include  $file_name;
            }else{
                $log = new \Mod\Logs\Logs;
                $m = "Не найдет файл: ".$file_name;
                $log->loging("view", $m);
            }
        }
    }
    public function view($dir,$page,$data = null){
        if($data != null){
            foreach($data as $d){
                $var_name = $d[0];
                $var_value = $d[1];
                $$var_name = $var_value;
            }
        }

        $conf = new \Mod\View\Config;
        $thems = $conf->thems;
        foreach($page as $p){
            $file_name = MYPOS.'\inter\thems\\'.$thems."\\".$dir."\\".$p.".php";  
                 
            //Проверка на существование файла
            if (file_exists($file_name)) {
                include  $file_name;
            }else{
                $log = new \Mod\Logs\Logs;
                $m = "Не найдет файл: ".$file_name;
                $log->loging("view", $m);
            }
        }
    }

    public function view_line($dir,$page,$data = null){
       

        $conf = new \Mod\View\Config;
        $thems = $conf->thems;
        foreach($page as $p){
            $file_name = MYPOS.'\inter\thems\\'.$thems."\\".$dir."\\".$p.".php";  
                 
            //Проверка на существование файла
            if (file_exists($file_name)) {
                include  $file_name;
            }else{
                $log = new \Mod\Logs\Logs;
                $m = "Не найдет файл: ".$file_name;
                $log->loging("view", $m);
            }
        }
    }

}