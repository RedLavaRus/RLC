<?php

namespace Mod\Permission;

Class Permission{

    public function job($id_user,$permission){
        
    }

    public function add_permission_user($id,$permission){
        $array_pex = $this->select_permission_user($id);
        var_dump($array_pex);
        if($array_pex == null) {
            $new_ar = true;
        }else{
            $new_ar = false;
        }
        $array_pex[]=$permission;
        
        $array_pex = array_unique($array_pex);
        
        $pex_ar=serialize($array_pex);
        if($new_ar){
            ECHO 1;
            //insert
                $sql = new \Mod\Sql\Sql;
                $connect = $sql->db_connect;
                $sth = $connect->prepare("INSERT INTO `pex_user` SET `user_id` = ?, `pex` = ?");
                $sth->execute(array($id,$pex_ar));
        }else{
            
            ECHO 2;
            //update
            $sql = new \Mod\Sql\Sql;
            $connect = $sql->db_connect;
            $sth = $connect->prepare("UPDATE `pex_user` SET `pex` = ? WHERE `user_id` = ?");
            $sth->execute(array($pex_ar,$id));
        }
        return ;

    }
    public function select_permission_user($id){
        $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `pex_user` WHERE `user_id` = ?");
        $sth->execute(array($id));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);
        //serialize()
        if( $result_sql["id"] >= 1){
            $array = unserialize($result_sql["pex"]);
            return $array;
        }else{
            return null;
        }

    }

    public function add_permission_group($id,$permission){
        
    }
    public function select_permission_group($id){
        
    }

    public function e402(){
        echo "error: don't have permission";
        die();
    }
}