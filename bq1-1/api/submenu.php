<?php
include_once "db.php";


if (isset($_POST['id'])) {




    foreach ($_POST['id'] as$idx=> $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {

            $Menu->del($id);
        } else {
            $row = $Menu->find($id);
            $row['text'] = $_POST['text'][$idx];
            $row['href'] = $_POST['href'][$idx];
            $row['sh'] = 1;
            $Menu->save($row);
        }
    }
}

if (isset($_POST['add_text']) && !empty($_POST['add_text'])) {
    foreach ($_POST['add_text'] as $idx => $text) {
        if($text!=""){
        $row = [];
        $row['text'] = $text;
        $row['href'] = $_POST['add_href'][$idx];
        $row['sh'] = 1;
        $row['menu_id'] = $_POST['sub_id'];
        $Menu->save($row);}
    }
}
