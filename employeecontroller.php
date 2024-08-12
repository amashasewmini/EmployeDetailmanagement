<?php


  //require_once("db.php");
 // require_once("genderdao.php");
  require_once("employeedao.php");

  // $employees = EmployeeDao::getAll(1);
  // $jsonData = json_encode($employees);
  // echo $jsonData;

  $hasname = !empty($_GET['name']);
  $hasgender = !empty($_GET['gender']);

  if($hasname){
    $name = $_GET['name'];
  }
  if($hasgender){
    $gender = $_GET['gender'];
  }
  //$employees = null;
  $employees = array();


  if(!$hasname && !$hasgender) $employees = EmployeeDao::getAll(1);
  if($hasname && !$hasgender) $employees = EmployeeDao::getByName($name);
  if(!$hasname && $hasgender) $employees = EmployeeDao::getByGender($gender);
  if($hasname && $hasgender) $employees = EmployeeDao::getByNameAndGender($name, $gender);

  $jsonData = json_encode($employees);
  echo $jsonData;
?>
