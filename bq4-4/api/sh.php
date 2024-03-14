<?php
include_once "db.php";

$row=$Good->find($_GET['id']);
if($_GET['sh']==0){
$row['sh']=0;

}else{
    $row['sh']=1;
}
$Good->save($row);
to("../back.php?do=th");