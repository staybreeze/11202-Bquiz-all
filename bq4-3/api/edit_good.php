<?php
include_once "db.php";

$row=$Good->find($_POST['id']);


if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];

}

$row['text']=$_POST['text'];
$row['big']=$_POST['big'];
$row['mid']=$_POST['mid'];
$row['price']=$_POST['price'];
$row['spec']=$_POST['spec'];
$row['stock']=$_POST['stock'];
$row['intro']=$_POST['intro'];
$Good->save($row);
// to("../back.php?do=th");