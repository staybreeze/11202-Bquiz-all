<?php
include_once "db.php";

$Que->save([
    'text'=>$_POST['subject'],
    'vote'=>0,
    'subject_id'=>0,
]);

$sub_id=$Que->find(['text'=>$_POST['subject']])['id'];
foreach($_POST['mid'] as $idx=> $mid){
    $Que->save([
        'text'=>$mid,
        'vote'=>0,
        'subject_id'=>$sub_id,
    ]);
}
to("../back.php?do=que");
