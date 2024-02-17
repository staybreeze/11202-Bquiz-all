<?php

include_once "db.php";

if(isset($_POST['del'])&&in_array($_POST['del'],$_POST)){
    foreach($_POST['del'] as $del){
        $User->del($del);
    }
}
to("../back.php?do=admin");