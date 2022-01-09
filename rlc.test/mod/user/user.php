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
        
        if(isset($_POST["submit"])){
            $login = $_POST["login"];
            $password1 = $_POST["password1"];
            $button =  $_POST["submit"];  
            $array_data = $this->form_array_login($login, $password1,$button);
        }else{            
            $array_data = $this->form_array_register();
        }
        //Проверка нажата ли кнопка
        $pres = $this->check_button_pressed($array_data);
        //Вывод формы
        if(!$pres){
            $this->show_login();
            return $this;
        }
        $this->login($array_data);
    }
    public function start_register(){
        //Начальные данные
        if(isset($_POST["submit"])){
            $login = $_POST["login"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];
            $email = $_POST["email"];
            $button =  $_POST["submit"];              
            $array_data = $this->form_array_register($login, $password1, $password2, $email,$button);
        }else{
            $array_data = $this->form_array_register();
        }
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
    public function form_array_register($login = null, $password1 = null, $password2 = null, $email = null,$button = null){
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
        if($button["button"] == "Далее"){
            return true;
        }
        return false;
    }

    public function show_login($error = null){
        $page[]="linemenu";
        $page[]="login";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page,$error);
    }
    /*
        Показать форму регистрации
    */
    public function show_register($error = null){
        $page[]="linemenu";
        $page[]="register";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page,$error);
    }

    /*
        Запуск процесса регистрации
    */
    public function register($array_data){
        $error_act = false;
        $result_error = null;
        //проверка на ошибки
        $error = $this-> error_ckeking_register($array_data);
        //Если ошибка есть то выводим форму
        foreach($error as $er){
            if(isset($er["active"]) and $er["active"] == "act"){
                $error_act = true;
                unset($er["active"]);
                $var_name1 = array_keys($er);
                $var_name = $var_name1[0];
                $var_date = $er[$var_name];
                $result_error[] = array($var_name,$var_date);
            }
        }

        if($error_act){

            $this->show_register($result_error);
            return;
        }
        
        $array_data["hashpass"] = $this->hash_pass($array_data);
        $array_data["status"] = "NEW";
        $array_data["datereg"] = date("d.m.Y H:i:s");
        $array_data["ipreg"] = "test";//$_SERVER['HTTP_CLIENT_IP'];
        $array_data["dateauth"] = "none";
        $array_data["ipauth"] = "none";//$_SERVER['HTTP_CLIENT_IP'];
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("INSERT INTO `user` SET `login` = ?, `password` = ?, `email` = ?, `status` = ?, `datereg` = ?, `ipreg` = ?,`dateauth` = ?, `ipauth` = ?");
            $sth->execute(array($array_data["login"],$array_data["hashpass"],$array_data["email"],$array_data["status"],$array_data["datereg"],$array_data["ipreg"],$array_data["dateauth"],$array_data["ipauth"]));
        echo "готово";
    }

    
    public function login($array_data){
        $error_act = false;
        $result_error = null;
        //проверка на ошибки
        $error = $this-> error_ckeking_login($array_data);
        foreach($error as $er){
            if(isset($er["active"]) and $er["active"] == "act"){
                $error_act = true;
                unset($er["active"]);
                $var_name1 = array_keys($er);
                $var_name = $var_name1[0];
                $var_date = $er[$var_name];
                $result_error[] = array($var_name,$var_date);
            }
        }

        if($error_act){

            $this->show_login($result_error);
            return;
        }

        $this->go_auth($array_data);
        $this->up_auth($array_data);
        //Если ошибка есть то авторизовываем
    }

    public function go_auth($array_data){
       
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `user` WHERE `login` = ?");
        $sth->execute(array($array_data["login"]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        
        $array_data["hashpass"] = $this->hash_pass($array_data);
       
        if(!$result_sql["id"] >=  1){
            $error["active"] = "act";
            $error["pass1"] = "Что-то пошло не так";
            return $error;
        }

        $_SESSION["id"] = $result_sql["id"];
       
    }

    public function up_auth($array_data){

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

    public function error_ckeking_login($array_data){
        $error = null;
        //Проверить соответствует ли длина логина
        $error[] = $this->length_check("login", $array_data);
        //проверить соответсвует ли длина пароля
        $error[] = $this->length_check("pass",$array_data);
        //Проверка свободен ли логин
        $error[] = $this->ckekin_auth($array_data);
        return $error;
    }
   
    public function auth(){
        
    }
   
    public function exit(){
        
    }
   
    public function recovery(){
        
    }

    public function ckekin_auth($array_data){
        
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `user` WHERE `login` = ?");
        $sth->execute(array($array_data["login"]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        
        $array_data["hashpass"] = $this->hash_pass($array_data);
        if($result_sql["password"] !=  $array_data["hashpass"]){
            $error["active"] = "act";
            $error["pass1"] = "Неверный пароль";
            return $error;
        }
    }

    public function checking_uniformity($array_data){   
        $error=null;     
        if($array_data["password1"] != $array_data["password2"]){
            $error["active"] = "act";
            $error["pass1"] = "Пароли не совпадают";
            $error["pass2"] = "Пароли не совпадают";
        }
        return $error;
    }
    
    public function length_check($type,$array_data){
        $error=null;   
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
        $error=null;   
        if (!filter_var($array_data["email"], FILTER_VALIDATE_EMAIL)) {
            $error["active"] = "act";
            $error["email"] = "Неверная почта";
        }
        return $error;
    }

    public function checking_login_free($array_data){
        $error=null;   
        //$array_data["login"]
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `user` WHERE `login` = ?");
            $sth->execute(array($array_data["login"]));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            
        if($result_sql["id"] >= 1){
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