<?php
include_once "db.php";

if(isset($_GET['sh'])){
    $row=$Good->find($_GET['id']);
    $row['sh']=1;
    $Good->save($row);
}else{
    $row=$Good->find($_GET['id']);
    $row['sh']=0;
    $Good->save($row);
}

to("../back.php?do=th");