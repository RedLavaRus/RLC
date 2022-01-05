<?php

namespace Mod\View;

Class View{
    public function show($page){
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
}