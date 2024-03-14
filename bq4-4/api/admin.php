<?php
include_once "db.php";
if($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])>0){
    echo 1;
    $_SESSION['admin']=$_POST['acc'];
}else{
    echo 0;
}
