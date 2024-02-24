<?php
include_once "db.php";

$res=$User->count(['email'=>$_POST['email']]);
$user=$User->find(['email'=>$_POST['email']]);
if($res>0)
    {
        echo "您的密碼為:{$user['pw']}";
    }else{
        echo "查無此資料";
    }

