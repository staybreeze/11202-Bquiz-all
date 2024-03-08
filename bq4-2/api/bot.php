<?php
include_once "db.php";
$row=$Bot->find(1);
$row['bot']=$_POST['bot'];
$Bot->save($row);
to("../back.php?do=bot");