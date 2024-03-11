<?php
include_once "db.php";

$row=$Type->find($_POST['id']);

// dd($_POST);
$row['text']=$_POST['text'];
$Type->save($row);