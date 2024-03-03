<?php
include_once "db.php";


$DB=${ucfirst($_POST['table'])};
$table=$_POST['table'];
unset($_POST['table']);

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

if($table != 'admin'){
    $_POST['sh']=($table=='title')?0:1;
}
dd($_POST);
$DB->save($_POST);

to("../back.php?do={$table}");
?>

