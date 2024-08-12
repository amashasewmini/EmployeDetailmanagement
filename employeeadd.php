<?php

require_once("employeedao.php");
// var_dump($_POST);
$errors = "";

if(!isset($_POST['employee'])){
    $errors = "Employee Not Available";
}else{
    $employee = json_decode($_POST['employee']);

    if(!(isset($employee->name) )&& (isset($employee->age)) && (isset($employee->nic)) && (isset($employee->gender))){
        $errors = " Employee data missing";
    }else{
        if(!preg_match("/^[A-Z][a-z]{2,}$/", $employee->name)) $errors = $errors . "Name Invalid ";
        if(!preg_match("/^([1-1][8-9]|[2-4][0-9]|[50])$/", $employee->age)) $errors = $errors . "Age Invalid ";
        if(!preg_match("/^([0-9]{9}[V|v|x|X]|[0-9]{12})$/", $employee->nic)) $errors = $errors . "NIC Invalid ";
        if($employee->gender === null) $errors = $errors . "Gender Not Selected ";
    }
}

if($errors !== ""){
    echo($errors);
}else{
    if(EmployeeDao::getByNic($employee->nic) !== null){
        echo("This NIC is already exist");
    }else{
        $result = EmployeeDao::insertEmployee($employee);
        if($result != 1){
            echo("Database Error");
        }
    }
}

// var_dump($_POST);
// var_dump($GLOBALS);
//$employee = $_POST['employee'];
//var_dump($employee);
?>