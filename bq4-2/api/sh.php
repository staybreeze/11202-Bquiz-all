<?php
include_once "db.php";

$row=$Good->find($_GET['id']);

if($_GET['sh']==1){
    $row['sh']=1;
}else{
    $row['sh']=0;
}

$Good->save($row);
to("../back.php?do=th");