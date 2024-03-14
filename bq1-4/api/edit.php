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
                        case "image":
                            $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                            // $row['text'] = $_POST['text'][$idx];
                            break;
                            case "ad":
                                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                                $row['text'] = $_POST['text'][$idx];
                                break;
                                case "news":
                                    $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                                    $row['text'] = $_POST['text'][$idx];
                                    break;
                                    case "admin":
                                        // $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                                        $row['acc'] = $_POST['acc'][$idx];
                                        $row['pw'] = $_POST['pw'][$idx];
                                        break;
                                        case "total":
                                            // $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                                            $row['total'] = $_POST['total'][$idx];
                                            // $row['pw'] = $_POST['pw'][$idx];
                                            break;
                                            case "bottom":
                                                // $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                                                $row['bottom'] = $_POST['bottom'][$idx];
                                                // $row['pw'] = $_POST['pw'][$idx];
                                                break;
                                    
            }$DB->save($row);
        }
    }
}


to("../back.php?do=$table");