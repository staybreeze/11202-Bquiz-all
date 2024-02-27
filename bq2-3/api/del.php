<?php
include_once "db.php";

foreach($_POST['del'] as $del){
    $User->del($del);
}

to("../back.php?do=admin");