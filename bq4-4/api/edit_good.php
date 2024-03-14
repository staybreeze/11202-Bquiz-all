<?php
include_once "db.php";

$row=$Good->find($_POST['id']);

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

$row['img']=  $_POST['img'];
$row['sh']=1;
$row['big']=$_POST['big'];
$row['mid']=$_POST['mid'];
$row['text']=$_POST['text'];
$row['price']=$_POST['price'];
$row['spec']=$_POST['spec'];
$row['intro']=$_POST['intro'];

$Good->save($row);
to("../back.php?do=th");