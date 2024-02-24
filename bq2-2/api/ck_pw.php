<?php
include_once "db.php";

if($User->count(['pw'=>$_POST['pw']])>0){
    echo 1;
    $_SESSION['user']=$_POST['acc'];
}else{
    echo 0;
}

?>