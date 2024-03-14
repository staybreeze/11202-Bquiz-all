<?php
include_once "db.php";

dd($_POST);
$row=$Type->find($_POST['id']);
$row['text']=$_POST['name'];
$Type->save($row);