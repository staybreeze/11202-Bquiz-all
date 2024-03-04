<?php
include_once "db.php";

$Bottom->save(['id'=>1,'bottom'=>$_POST['bottom']]);

to("../back.php?do=bottom");