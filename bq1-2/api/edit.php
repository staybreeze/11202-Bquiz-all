<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($_POST['table'])};
unset($_POST['table']);
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    } else {
        $row = $DB->find($id);
        switch ($table) {
            case "title":
                dd($_POST['sh']);
                $row['text'] = $_POST['text'][$idx];
                $row['sh'] = ($row['id']==$_POST['sh']) ? 1 : 0;
                break;
        }
        $DB->save($row);
    }
}
      

to("../back.php?do=$table");
