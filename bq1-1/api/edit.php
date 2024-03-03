<?php
include_once "db.php";
$DB = ${ucfirst($_POST['table'])};
$table = $_POST['table'];
unset($_POST['table']);

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $DB->del($id);
        } else {
            $row = $DB->find($id);
            switch ($table) {
                case "title":
                    $row['sh'] = (isset($_POST['sh'])) ? 1 : 0;
                    break;
                case "mvim":
                    $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                    break;
                case "ad":
                    $row['text'] = $_POST['text'][$idx];
                    $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                    break;
                case "news":
                    $row['text'] = $_POST['text'][$idx];
                    $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                    break;
                    case "menu":
                        $row['text'] = $_POST['text'][$idx];
                        $row['href'] = $_POST['href'][$idx];
                        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                        break;
                case "bottom":
                    $row['bottom'] = $_POST['bottom'][$idx];
                    // $row['sh'] = (isset($_POST['sh'] )&& in_array($id,$_POST['sh'])) ? 1 : 0;
                    break;
                    case "total":
                        $row['total'] = $_POST['total'][$idx];
                        // $row['sh'] = (isset($_POST['sh'] )&& in_array($id,$_POST['sh'])) ? 1 : 0;
                        break;
            }
            $DB->save($row);
        }
    }
}

to("../back.php?do={$table}");
