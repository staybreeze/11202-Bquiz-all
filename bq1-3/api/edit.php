<?php
include_once "db.php";
// dd($_POST['sh']);
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);

foreach ($_POST['id'] as$idx=> $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
        dd($id);
    } else {
        $row = $DB->find($id);
        switch ($table) {
            case "title":
                    $row['text'] = $_POST['text'][$idx];
                    $row['sh'] = ($_POST['sh']==$row['id']) ? 1 : 0;

                break;
                case "mvim":

                    $row['sh'] = (isset($_POST['sh'])&&in_array($id,$_POST['sh'])) ? 1 : 0;

                break;
                case "image":

                    $row['sh'] = (isset($_POST['sh'])&&in_array($id,$_POST['sh'])) ? 1 : 0;

                break;
                case "ad":

                    $row['sh'] = (isset($_POST['sh'])&&in_array($id,$_POST['sh'])) ? 1 : 0;

                             $row['text'] = $_POST['text'][$idx];
                break;
                case "total":
                    // $row['sh'] = (isset($_POST['sh'])&&in_array($id,$_POST['sh'])) ? 1 : 0;

                             $row['total'] = $_POST['total'][$idx];
                break;
                case "bottom":

                    // $row['sh'] = (isset($_POST['sh'])&&in_array($id,$_POST['sh'])) ? 1 : 0;

                             $row['bottom'] = $_POST['bottom'][$idx];
                break;
                case "news":

                    $row['sh'] = (isset($_POST['sh'])&&in_array($id,$_POST['sh'])) ? 1 : 0;

                             $row['text'] = $_POST['text'][$idx];
                break;
        }
        $DB->save($row);
    }
}

to("../back.php?do=$table");
