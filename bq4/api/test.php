<?php
include_once "db.php";
$admin['acc']='admin';
$admin['pw']='1234';
$admin['pr']=serialize([1,2,3,4,5]);

$Admin->save($admin);