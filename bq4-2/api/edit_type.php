<?php
include_once "db.php";


$row=$Type->find($_POST['id']);
$row['text']=$_POST['name'];


$Type->save($row);

// to("../back.php?do=user");