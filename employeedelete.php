<?php

require_once("employeedao.php");
// var_dump($_POST);
$errors = "";

if(!isset($_POST['employee'])){
    $errors = "Employee Not Available";
}else{

    if($errors !== ""){
        echo($errors);
    }else{
        $employee = json_decode($_POST['employee']);
        // if(EmployeeDao::getByNic($employee->nic) !== null){
        //     echo("This NIC is already exist");
        // }else{
            $result = EmployeeDao::deleteEmployee($employee);
            if($result != 1){
                echo("Database Error");
            }
        }
    //}

}



// var_dump($_POST);
// var_dump($GLOBALS);
//$employee = $_POST['employee'];
//var_dump($employee);
?>