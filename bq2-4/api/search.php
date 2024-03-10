<?php
include_once "db.php";

if($User->count(['email'=>$_POST['email']])>0){
    $row=$User->find(['email'=>$_POST['email']]);
    echo "您的密碼為:{$row['pw']}";
}else{
    echo "查無此資料";
}