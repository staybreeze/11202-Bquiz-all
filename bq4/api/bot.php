<?php
include_once "db.php";
$Bottom->save(['id'=>1,'bottom'=>$_POST['bot']]);

to("../back.php?do=bot")
?>