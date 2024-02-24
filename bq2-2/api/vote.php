<?php
include_once "db.php";
dd($_POST);
$opt = $Que->find(['id' => $_POST['opt']]);
dd($opt);
$opt['vote']++;
$Que->save($opt);



$sub = $Que->find(['id' => $opt['subject_id']]);
$sub['vote']++;
$Que->save($sub);

to("../index.php?do=result&id={$sub['id']}");
