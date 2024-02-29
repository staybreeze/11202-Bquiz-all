<?php
include_once "db.php";

$DB = ${ucfirst($_POST['table'])};
$table = $_POST['table'];
unset($_POST['table']);

foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    } else {      dd($row);
        dd($_POST);
        dd($id);
        $row = $DB->find($id);
        if (isset($row['text'])) {
            $row['text'] = $_POST['text'][$key];
        }
  
        switch ($table) {
            case "title":
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;

                break;
            case "admin":
                break;
            case "":
                break;
            case "menu":
                break;
            default:;
        }
        $DB->save($row);
    }
}
