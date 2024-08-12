<?php

class CommonDao{
    public static function getResult($query){

        $servername ="localhost";
        $Username = "root";
        $password ="1234";
        $database ="earth";

        $dbconn = new mysqli($servername, $Username, $password, $database);

        if(!$dbconn){
            die("Connection failed: " . $dbconn->connect_error);
        }

        $result = $dbconn->query($query);
        return $result;
    }
}
?>