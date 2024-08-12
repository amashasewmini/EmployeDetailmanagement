<?php

require_once("db.php");
require_once("gender.php");

class GenderDao{

    public static function setData($row){
        $gender = new Gender();

        $gender->setId($row['id']);
        $gender->setName($row['name']);
     
        return $gender;
    }
    public static function getById($id){
        $gender = null;

        $query = "SELECT * FROM gender WHERE id = ".$id;
        // $dbconn = CommonDao::getResult($query);
        $result = CommonDao::getResult($query);
        // $result = $dbconn->query($query);

        if($row = $result->fetch_assoc()){
            $gender = GenderDao::setData($row);
        }
        return $gender; 
    }

    public static function getAll(){

        $genders = array();

        $query = "SELECT * FROM gender";
        // $dbconn = CommonDao::getResult($query);
        $result = CommonDao::getResult($query);
        // $result = $dbconn->query($query);

        while( $row = $result->fetch_assoc()){

            $gender = GenderDao::setData($row);

            array_push($genders,$gender);
        }
    
        return $genders;
    }

}
?>