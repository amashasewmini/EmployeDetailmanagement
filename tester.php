<?php
echo("Testing ..!");

require_once("db.php");
require_once("genderdao.php");
require_once("employeedao.php");

// $gender = GenderDao::getById(1);

// var_dump($gender);

// $id = $gender->getId();
// $name =$gender->getName();

// echo("[{'id':'$id','name':'$name'}]");


// $gender = GenderDao::getAll(1);
// var_dump($genders);

// $json = "[";

// foreach($genders as $itm=>$gender){

// $json = $json."{'id':'.$gender->getId().','name':'".$gender->getName()."'},";
    
// }
// $json = rtrim($json , ",");
// $json = $json."]";

// echo($json);

$employee = EmployeeDao::getById(6);

var_dump($employee);

$id = $employee->getId();
$name =$employee->getName();

echo("[{'id':'$id','name':'$name'}]");


$employees = EmployeeDao::getAll(6);
var_dump($employees);

$json = "[";

foreach($employees as $itm=>$employee){

$json = $json."{'id':'".$employee->getId()."','name':'".$employee->getName()."'},";
    
}
$json = rtrim($json , ",");
$json = $json."]";

echo($json);


?>