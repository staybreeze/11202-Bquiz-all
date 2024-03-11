<?php
include_once "db.php";

$row=$Mem->find($_POST['id']);




$row['name']=$_POST['name'];
$row['email']=$_POST['email'];
$row['addr']=$_POST['addr'];
$row['tel']=$_POST['tel'];

$Mem->save($row);
to("../back.php?do=mem");