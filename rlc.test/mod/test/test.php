<?php

namespace Mod\test;

Class Test{
    public function test(){
        $test = new \Mod\Logs\Logs;
        $test ->loging("test","test comp");
        echo "test complate!";
    }

}