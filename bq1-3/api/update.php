<?php
include_once "db.php";

$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);



if (isset($_FILES['img']['tmp_name'])) {

    move_uploaded_file($_FILES['img']['tmp_name'], "../img" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
$row=$DB->find($_POST['id']);

switch ($table) {
    case "title":
       $row['img']=$_POST['img'];

        break;
}
$DB->save($row);
to("../back.php?do=$table");
