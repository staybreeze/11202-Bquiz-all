<?php
include_once "db.php";

$DB=${ucfirst($_POST['table'])};
$table=$_POST['table'];

if(isset($_FILES['img']['tmp_name'])){

    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

$row=$DB->find($_POST['id']);
$row['img']=$_POST['img'];
$DB->save($row);

to("../back.php?do={$table}");