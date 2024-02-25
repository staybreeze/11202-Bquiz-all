<?php
include_once "db.php";

if($User->count(['pw'=>$_POST['pw']])>0){
    $_SESSION['user']=$_POST['acc'];
    echo 1;
    }else{
        echo 0;
    }