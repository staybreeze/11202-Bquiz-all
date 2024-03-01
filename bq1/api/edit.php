<?php
include_once "db.php";

$DB = ${ucfirst($_POST['table'])};
$table = $_POST['table'];
unset($_POST['table']);

foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $DB->del($id);
    } else {     
        // dd($_POST);
        // dd($id);
        $row = $DB->find($id);
        if (isset($row['text'])) {
            $row['text'] = $_POST['text'][$key];
        }
        if (isset($row['total'])) {
            $row['total'] = $_POST['total'][$key];
        }

        if (isset($row['bottom'])) {
            $row['bottom'] = $_POST['bottom'][$key];
        }
  
        switch ($table) {
            case "title":
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;

                break;
            case "admin":
                $row['acc']=$_POST['acc'];
                $row['pw']=$_POST['pw'];
                break;
            // case "":
            //     break;
            case "menu":
                break;
            default:
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            ;
        }
        // dd($_POST);
        //       dd($row);
        // dd($id);
        // dd($DB);
       $res= $DB->save($row);
    //    dd($res);
    }
}

to("../back.php?do={$table}");