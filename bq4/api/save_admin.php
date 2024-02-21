<?php
include_once "db.php";
dd($_POST['pr']);
$_POST['pr']=serialize($_POST['pr']);
$Admin->save($_POST);

to("../back.php?do=admin");