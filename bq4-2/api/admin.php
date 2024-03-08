<?php
include_once "db.php";

if($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])>0){

    $_SESSION['admin']=$_POST['acc'];
    echo 1;
}else{
    echo 0;
}
?>