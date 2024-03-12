<?php
include_once "db.php";

if (isset($_POST['text'])) {

    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Menu->del($id);
        } else {
            $row=$Menu->find($id);
            $row['text'] = $_POST['text'][$idx];
            $row['href'] = $_POST['href'][$idx];
            $Menu->save($row);
        }
    }
}


if (isset($_POST['add_text'])) {
    foreach ($_POST['add_text'] as $idx => $text) {

        $row = [];
        $row['text'] = $text;
        $row['href'] = $_POST['add_href'][$idx];
        $row['sh'] = 1;
        $row['sub_id'] = $_POST['subject'];
        $Menu->save($row);
    }
}

to("../back.php?do=menu");