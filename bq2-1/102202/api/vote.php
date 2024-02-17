<?php

include_once "db.php";

$row=$Que->find($_POST['opt']);
$row['vote']++;
$Que->save($row);
$sub=$Que->find($row['subject_id']);
$sub['vote']++;
$Que->save($sub);

to("../index.php?do=result&id={$sub['id']}");