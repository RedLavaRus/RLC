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
        //Преобразовать форму в массив
        $login =  "login";
        $password =  "pass";
        $button =  "gotovo";
        $array_data = $this->form_array_login($login, $password,$button);
        //Проверка нажата ли кнопка
        $pres = $this->check_button_pressed($array_data);
        //Вывод формы
        if(!$pres){
            $this->show_register();
            return $this;
        }
    }
    public function start_register(){
        //Начальные данные
        $login = "";
        $password1 = "";
        $password2 = "";
        $email = "";
        $button =  "gotovo";        
        $array_data = $this->form_array_register($login, $password1, $password2, $email,$button);
        //Проверка нажата ли кнопка
        $pres = $this->check_button_pressed($array_data);
        //Вывод формы
        if(!$pres){
            $this->show_register();
            return $this;
        }
        $this->register($array_data);
    }
    /*
        Преобразовывает данные с формыв единый массив
        TODO: Добавить проверку капчи
    */
    public function form_array_login($login, $password,$button){
        $array_data["login"] = $login;
        $array_data["password1"] = $password;
        $array_data["button"] = $button;
        return  $array_data;
    }
    /*
        Преобразовывает данные с формыв единый массив
        TODO: Добавить проверку капчи
    */
    public function form_array_register($login, $password1, $password2, $email,$button){
        $array_data["login"] = $login;
        $array_data["password1"] = $password1;
        $array_data["password2"] = $password2;
        $array_data["email"] = $email;
        $array_data["button"] = $button;
        return  $array_data;
    }
    /*
        Проверка нажата ли кнопка авторизации
        Возвращает труе или фалсе
    */
    public function check_button_pressed($button){
        if($button["button"] == "Готово"){
            return true;
        }
        return false;
    }

    public function show_login(){
        $page[]="linemenu";
        $page[]="login";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }
    /*
        Показать форму регистрации
    */
    public function show_register(){
        $page[]="linemenu";
        $page[]="register";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }

    /*
        Запуск процесса регистрации
    */
    public function register($array_data){
        //проверка на ошибки
        $error = $this-> error_ckeking_register($array_data);
        //Если ошибка есть то выводим форму
        if($error != null){
            $this->show_register();
            return;
        }
        $array_data["hashpass"] = $this->hash_pass($array_data);
        
    }

    /*
        Процесс проверки регистрации на оишбку
    */

    public function error_ckeking_register($array_data){
        $error = null;
        //проверить совпадают ли пароли
        $error[] = $this->checking_uniformity($array_data);
        //Проверить соответствует ли длина логина
        $error[] = $this->length_check("login", $array_data);
        //проверить соответсвует ли длина пароля
        $error[] = $this->length_check("pass",$array_data);
        //проверить релевантность емаила
        $error[] = $this->checking_email($array_data);
        //Проверка свободен ли логин
        $error[] = $this->checking_login_free($array_data);
        return $error;
    }
   
    public function auth(){
        
    }
   
    public function exit(){
        
    }
   
    public function recovery(){
        
    }

    public function checking_uniformity($array_data){        
        if($array_data["password1"] != $array_data["password2"]){
            $error["active"] = "act";
            $error["pass1"] = "Пароли не совпадают";
            $error["pass2"] = "Пароли не совпадают";
        }
        return $error;
    }
    
    public function length_check($type,$array_data){
        $cfg = new \Mod\User\Config;
        if($type == "login"){
            if(strlen($array_data["login"]) > $cfg->max_login){
                $error["active"] = "act";
                $error["login"] = "Максимальная длинна логина ".$cfg->max_login." символов.";
            }
            if(strlen($array_data["login"]) < $cfg->min_login){
                $error["active"] = "act";
                $error["login"] = "Минимальная длинна логина ".$cfg->min_login." символов.";
            }
        }
        if($type == "pass"){
            if(strlen($array_data["password1"]) > $cfg->max_pass){
                $error["active"] = "act";
                $error["pass1"] = "Максимальная длинна пароля ".$cfg->max_pass." символов.";
            }
            if(strlen($array_data["password1"]) < $cfg->min_pass){
                $error["active"] = "act";
                $error["pass1"] = "Минимальная длинна пароля ".$cfg->min_pass." символов.";
            }

        }
        return $error;

    }
    
    public function checking_email($array_data){
        if (!filter_var($array_data["email"], FILTER_VALIDATE_EMAIL)) {
            $error["active"] = "act";
            $error["email"] = "Неверная почта";
        }
        return $error;
    }

    public function checking_login_free($array_data){
        //$array_data["login"]
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `user` WHERE `login` = ?");
            $sth->execute(array($array_data["login"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        if($result_sql["id"]){
            $error["active"] = "act";
            $error["login"] = "Логин занят";
        }
        return $error;
    }
    

    /*
        Генерирует хеш пароля
    */
    public function hash_pass($array_data){
        $cfg = new \Mod\User\Config;
        $hash = $array_data["password1"].$cfg->salt;
        $hash = hash('sha256', $hash);
        $hash = $hash.$array_data["login"];
        $hash = hash('sha256', $hash);
        return $hash;
    }
}