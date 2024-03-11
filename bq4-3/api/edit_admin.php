<?php
include_once "db.php";
$_POST['pr']=serialize($_POST['pr']);

$row=$Admin->find($_POST['id']);
$row['pr']=$_POST['pr'];
$row['acc']=$_POST['acc'];
$row['pw']=$_POST['pw'];



$Admin->save($row);
to("../back.php?do=admin");