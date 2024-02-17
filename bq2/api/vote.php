<?php

include_once "db.php";
$id=$_POST['opt'];
$opt=$Que->find($id);
$opt['vote']++;

$Que->save($opt);
$sub=$Que->find($opt['subject_id']);
$sub['vote']++;
$Que->save($sub);
to("../index.php?do=result&id={$sub['id']}");