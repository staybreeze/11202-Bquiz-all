<?php
include_once "db.php";

$Type->save([
    'text'=>$_POST['text'],
    'big_id'=>$_POST['big_id'],
    'sh'=>1
]);