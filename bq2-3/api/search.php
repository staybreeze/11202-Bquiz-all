<?php
include_once "db.php";

$res=$User->find(['email'=>$_POST['email']]);
if($User->count(['email'=>$_POST['email']])>0){
echo "您的密碼為:{$res['pw']}";
}else{
echo "查無此資料";
}