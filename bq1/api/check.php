<?php
include_once "db.php";

if($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])>0){
    $_SESSION['admin']=1;
    to("../back.php");
}else{
    to("../index.php?do=login&error=帳號或密碼輸入錯誤");
}