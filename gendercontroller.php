<?php


  require_once("db.php");
  require_once("genderdao.php");
  require_once("employeedao.php");

  $genders = GenderDao::getAll(1);
  

  $jsonData = json_encode($genders);
  echo $jsonData;
?>