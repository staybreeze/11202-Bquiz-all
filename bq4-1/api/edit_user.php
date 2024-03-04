<?php
include_once "db.php";



$row=$User->find($_POST['id']);
$_POST['date']=$row['date'];

$User->save($_POST);
to("../back.php?do=user");
