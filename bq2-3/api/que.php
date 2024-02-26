<?php
include_once "db.php";

$Que->save(['subject'=>$_POST['subject'],'subject_id'=>0]);
$sub=$Que->find(['subject'=>$_POST['subject'],'subject_id'=>0])['id'];
foreach($_POST['opt'] as $opt){
    $Que->save(['subject'=>$opt,'subject_id'=>$sub]);

}