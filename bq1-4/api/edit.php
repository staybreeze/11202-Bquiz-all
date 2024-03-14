<?php

include_once "db.php";

echo $_POST['sh'];
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);


if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $DB->del($id);
        } else {
            $row = $DB->find($id);
            switch ($table) {
                case "title":
                    $row['sh'] = ($row['id'] == $_POST['sh']) ? 1 : 0;
                    $row['text'] = $_POST['text'][$idx];
                    break;
                    case "mvim":
                        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                        // $row['text'] = $_POST['text'][$idx];
                        break;
            }$DB->save($row);
        }
    }
}


to("../back.php?do=$table");