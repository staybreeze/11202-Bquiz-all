<?php
include_once "db.php";

$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);

if (isset($_FILES['img']['tmp_name'])) {

    move_uploaded_file($_FILES['img']['tmp_name'], "../img" . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

switch ($table) {
    case "title":
        $_POST['sh'] = 0;
        $Title->save($_POST);

        break;
        case "mvim":
            $_POST['sh'] = 1;
            $Mvim->save($_POST);
    
            break;
}

to("../back.php?do=$table");
