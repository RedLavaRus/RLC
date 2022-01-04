<?php

namespace Mod\Cron;

Class Cron{

    public function __construct(){
        $dir =  MYPOS."\mod\\";
        $list_dir = scandir($dir);
        var_dump($list_dir);
        foreach($list_dir as $list){
            if($list == "." or $list == ".." or $list == "cron") continue;
            echo "<br> ".$list."<br> ";
            $mod_name = '\Mod\\'.$list."\Cron";
            if(file_exists(MYPOS."/".$mod_name . '.php')){
                $mod = new $mod_name;
                $mod->start();
            }            
        }
    }
}