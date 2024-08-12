<?php

require_once("db.php");
require_once("employee.php");
require_once("genderdao.php");

class EmployeeDao{

  public static function setData($row){

    $employee = new Employee();

    $employee->setId($row['id']);
    $employee->setName($row['name']);
    $employee->setAge($row['age']);
    $employee->setNic($row['nic']);
    $gender = GenderDao::getById($row['gender_id']);
    $employee->setGender($gender);

    return $employee;

  }
  public static function getById($id){

    $employee = null;

    $query = "SELECT * FROM employee WHERE id = ".$id;
    $result = CommonDao::getResult($query);
    //  $result = $dbconn->query($query);

    if($row = $result->fetch_assoc()){
      $employee = EmployeeDao::setData($row);
    }
    return $employee; 

  }

  public static function getAll(){

    $employees = array();

    $query = "SELECT * FROM employee";
    $result = CommonDao::getResult($query);
   // $result = $dbconn->query($query);

    while($row = $result->fetch_assoc()){

      $employee = EmployeeDao::setData($row); 
    
      array_push($employees,$employee);
    }
    
    return $employees;
  }

  public static function getByName($name){

    $employees = array();

    $query = "SELECT * FROM employee WHERE name LIKE'$name%'";
    $result = CommonDao::getResult($query);
    //$result = $dbconn->query($query);

    while( $row = $result->fetch_assoc()){

      $employee = EmployeeDao::setData($row);
    
      array_push($employees,$employee);
    }
    
    return $employees;
  }
  
  public static function getByGender($gender){

    $employees = array();

    $query = "SELECT * FROM employee WHERE gender_id = $gender";
    $result = CommonDao::getResult($query);
    //$result = $dbconn->query($query);

    while( $row = $result->fetch_assoc()){

      $employee = EmployeeDao::setData($row);
    
      array_push($employees,$employee);
    }
    
    return $employees;
  }

  public static function getByNameAndGender($name, $gender){

    $employees = array();

    $query = "SELECT * FROM employee WHERE name like'$name%' AND gender_id = $gender";
    $result = CommonDao::getResult($query);
    //$result = $dbconn->query($query);

    while( $row = $result->fetch_assoc()){

      $employee = EmployeeDao::setData($row);
    
      array_push($employees,$employee);
    }
    
    return $employees;
  }
  
  public static function getByNic($nic){

    $employee = null;

    $query = "SELECT * FROM employee WHERE nic = '$nic'";
    $result = CommonDao::getResult($query);
    //$result = $dbconn->query($query);
    if($row = $result->fetch_assoc()){
      $employee = EmployeeDao::setData($row);
    }
    return $employee;
  }

  public static function insertEmployee($employee){
    $query = "INSERT INTO employee (name, age, nic, gender_id) VALUES ('".$employee->name."',".$employee->age.",'".$employee->nic."',".$employee->gender->id.")";

    return CommonDao::getResult($query);
  }

  public static function updateEmployee($employee){
    $query = "UPDATE employee SET name='".$employee->name."', age=".$employee->age.", nic='".$employee->nic."', gender_id=".$employee->gender->id." WHERE id= ".$employee->id;
    
    return CommonDao::getResult($query);
  }

  public static function deleteEmployee($employee){

    if(EmployeeDao::getById($employee->id) == null){
      return "Employee Not Found";
    }else{
      $query = "DELETE FROM employee WHERE id =".$employee->id;
      return CommonDao::getResult($query);
    }

  }
      


}



?>