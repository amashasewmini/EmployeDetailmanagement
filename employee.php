<?php

class Employee{

public $name;
public $id;
public $gender;
public $age;
public $nic;

   function __construct(){}

   function getId(){ return $this->id;}
   function setId($id){$this->id = $id;}

   function getName(){ return $this->name;}
   function setName($name){$this->name = $name;}

   function getAge(){ return $this->age;}
   function setAge($age){$this->age = $age;}

   function getNic(){ return $this->nic;}
   function setNic($nic){$this->nic = $nic;}

   function getGender(){ return $this->gender;}
   function setGender($gender){$this->gender = $gender;}
   
}



?>
