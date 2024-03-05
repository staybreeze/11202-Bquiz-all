<?php
include_once "db.php";
$row=$Good->find($_POST['id']);
$_POST['no']=$row['no'];
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

$Good->save($_POST);
dd($_POST);

to("../back.php?do=th");
