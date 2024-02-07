<?php

include_once "db.php";
$res=$User->count(['email'=>$_POST['email']]);
echo $res;
