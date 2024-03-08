<?php
include_once "db.php";
$row=$Admin->find($_POST['id']);
$row['pr']=serialize($_POST['pr']);
$row['acc']=$_POST['acc'];
$row['pw']=$_POST['pw'];
$Admin->save($row);
to("../back.php?do=admin");