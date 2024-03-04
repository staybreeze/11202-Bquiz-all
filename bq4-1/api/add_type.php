<?php
include_once "db.php";

$Type->save(['name'=>$_POST['name'],'big_id'=>$_POST['big_id']]);