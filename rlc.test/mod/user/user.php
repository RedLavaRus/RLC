<?php

namespace Mod\User;

Class User{
    public $login;
    public $password;
    public $password2;
    public $email;
    public $status;
    public $id;
    public $e = null;
   /*
        $sql_create = '
        CREATE TABLE user (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(id),
            login VARCHAR(255) NOT NULL, 
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL,
            datereg VARCHAR(255) NOT NULL,
            ipreg VARCHAR(255) NOT NULL,
            dateauth VARCHAR(255) NOT NULL,
            ipauth VARCHAR(255) NOT NULL
           )
        ';
    new \Mod\User\Config;

   */
    public function register(){
        $login = "21312312";
        $pass1 = "21312312";
        $pass2 = "21312312";
        //проверить совпадают ли пароли
        $this->checking_uniformity($pass1, $pass2);
        //Проверить соответствует ли длина логина
        $this->length_check("login", $login);
        //проверить соответсвует ли длина пароля
        $this->length_check("pass",$pass1);
        //проверить релевантность емаила
        //проверка на ошибки
    }
   
    public function auth(){
        
    }
   
    public function exit(){
        
    }
   
    public function recovery(){
        
    }

    public function checking_uniformity($pass1, $pass2){        
        if($pass1 != $pass2){
            $e["active"] = "act";
            $e["pass1"] = "Пароли не совпадают";
            $e["pass2"] = "Пароли не совпадают";
        }
        return;
    }

    public function length_check($type,$var){
        $cfg = new \Mod\User\Config;
        if($type == "login"){

        }
        if($type == "pass"){

        }

    }
}