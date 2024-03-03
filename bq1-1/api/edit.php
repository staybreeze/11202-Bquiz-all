<?php
include_once "db.php";
$DB=${ucfirst($_POST['table'])};
$table=$_POST['table'];
unset($_POST['table']);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
        $DB->del($id);
    }else{
        $row=$DB->find($id);
        switch($table){
            case "title":
                $row['sh']=(isset($_POST['sh']))?1:0;
                break;
        }
        $DB->save($row);
    }
}}

to("../back.php?do={$table}");