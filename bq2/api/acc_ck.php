<?php

include_once "db.php";
$acc=$_POST['acc'];
if($User->count(['acc'=>$acc])==0){
    echo 0;
}else{
    echo 1;
};