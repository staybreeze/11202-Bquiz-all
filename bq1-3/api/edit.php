<?php
include_once "db.php";
dd($_POST['sh']);
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
        }
        $DB->save($row);
    }
}

to("../back.php?do=$table");
