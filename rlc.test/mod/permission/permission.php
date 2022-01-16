<?php

namespace Mod\Permission;

Class Permission{

    public function go($permission){
        if(isset($_SESSION["id"])){
            $id = $_SESSION["id"];
        }else{
            $id = 0;
        }
        
        if(!$this->join($id,$permission)){
            $this->e402();
        }
    }

    public function join($id_user,$permission){
        $allpex = null;
        $group = new \Mod\Group\Index;
        $grp_id = $group->show_group_user($id_user,"id");
        $px_grp = $this->select_permission_group($grp_id);
        $px_usr = $this->select_permission_user($id_user);
        if(isset($px_grp) and $px_grp!= null){
            foreach($px_grp as $px_g){
                $allpex[]=$px_g;
            }
        }
        if(isset($px_usr) and $px_usr!= null){
            foreach($px_usr as $px_u){
                $allpex[]=$px_u;
            }
        }
        if($allpex == null){return false;}
        return in_array($permission,$allpex);
        
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
        $array_pex = $this->select_permission_group($id);
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
                $sth = $connect->prepare("INSERT INTO `pex_grp` SET `grp_id` = ?, `pex` = ?");
                $sth->execute(array($id,$pex_ar));
        }else{
            
            ECHO 2;
            //update
            $sql = new \Mod\Sql\Sql;
            $connect = $sql->db_connect;
            $sth = $connect->prepare("UPDATE `pex_grp` SET `pex` = ? WHERE `grp_id` = ?");
            $sth->execute(array($pex_ar,$id));
        }
        return ; 
    }
    public function select_permission_group($id){
               $sql = new \Mod\Sql\Sql;
        $connect = $sql->db_connect;
        $sth = $connect->prepare("SELECT * FROM `pex_grp` WHERE `grp_id` = ?");
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

    public function e402(){
        echo "error: don't have permission";
        die();
    }
}