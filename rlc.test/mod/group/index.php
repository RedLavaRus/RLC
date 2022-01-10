<?php

namespace Mod\Group;

Class Index{
    
    /*
    Добавить группу
    */
    public function add_group($group,$name){
        if($this->take_id_group($group) >=1){
            return false;
        }
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("INSERT INTO `grp` SET `grp` = ?, `name` = ?");
            $sth->execute(array($group,$name));
            
        return true;
    }
    /*
    Удалить группу

    */
    public function delete_group($group){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("DELETE FROM `grp` WHERE `grp` = ?");
        $sth->execute(array($group));
        return $sth;
    }
    /*
    Список групп
    */
    public function list_group(){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `grp` ORDER BY `id`");
        $sth->execute();
        $array = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }
    /*
    Добавить пользователя в группу
    */

    /*
    Показать группу пользователя
    */
    /*
    Показать id группы
    */
    public function take_id_group($group){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
            $sth = $connect->prepare("SELECT * FROM `grp` WHERE `grp` = ?");
            $sth->execute(array($group));
            $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
            if(isset($result_sql["id"]) and $result_sql["id"] >=1){
                return $result_sql["id"];
            }
        return $result_sql["id"];

    }

    public function start(){
        $page[]="linemenu";
        $page[]="display";
        $page[]="shop";
        $page[]="footer";
        $view = new \Mod\View\View;
        $view->show($page);
    }
}