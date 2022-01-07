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
    public function start_login(){
        //Проверка нажата ли кнопка

        //Вывод формы
        $this->show_login();
    }
    public function start_register(){
        //Проверка нажата ли кнопка

        //Вывод формы
        $this->show_register();
    }

    public function show_login(){
        $page[]="linemenu";
        $page[]="login";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }

    public function show_register(){
        $page[]="linemenu";
        $page[]="register";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }

    public function register(){
        $login = "21312312";
        $pass1 = "21312312";
        $pass2 = "21312312";
        $email = "test@test.ru";
        //проверить совпадают ли пароли
        $this->checking_uniformity($pass1, $pass2);
        //Проверить соответствует ли длина логина
        $this->length_check("login", $login);
        //проверить соответсвует ли длина пароля
        $this->length_check("pass",$pass1);
        //проверить релевантность емаила
        $this->checking_email($email);
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
            if(strlen($var) > $cfg->max_login){
                $e["active"] = "act";
                $e["login"] = "Максимальная длинна логина ".$cfg->max_login." символов.";
            }
            if(strlen($var) < $cfg->min_login){
                $e["active"] = "act";
                $e["login"] = "Минимальная длинна логина ".$cfg->min_login." символов.";
            }
        }
        if($type == "pass"){
            if(strlen($var) > $cfg->max_pass){
                $e["active"] = "act";
                $e["pass1"] = "Максимальная длинна пароля ".$cfg->max_pass." символов.";
            }
            if(strlen($var) < $cfg->min_pass){
                $e["active"] = "act";
                $e["pass1"] = "Минимальная длинна пароля ".$cfg->min_pass." символов.";
            }

        }

    }
    
    public function checking_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $e["active"] = "act";
            $e["email"] = "Неверная почта";
        }
    }
}