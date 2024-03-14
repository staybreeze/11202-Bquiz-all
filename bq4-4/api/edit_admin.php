<?php
include_once "db.php";

$row=$Admin->find($_POST['id']);


$_POST['pr']=serialize($_POST['pr']);
$row['acc']=$_POST['acc'];
$row['pw']=$_POST['pw'];
$row['pr']=$_POST['pr'];


$Admin->save($row);
to("../back.php?do=admin");