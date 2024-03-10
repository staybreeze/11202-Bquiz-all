<?php
include_once "db.php";

$mid=$Que->find($_POST['mid']);
$mid['vote']++;
$Que->save($mid);


$big=$Que->find(['id'=>$mid['subject_id']]);
$big['vote']++;
$Que->save($big);

to("../index.php?do=result&id={$big['id']}");