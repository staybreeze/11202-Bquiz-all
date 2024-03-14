<?php

include_once "db.php";

$table = $_POST['table'];
$DB=${ucfirst($table)};
unset($_POST['table']);

switch ($table) {
    case "title":
        $_POST['sh'] = 0;
        break;
        case "mvim":
            $_POST['sh'] = 1;
            break;
}

$DB->save($_POST);

to("../back.php?do=$table");
