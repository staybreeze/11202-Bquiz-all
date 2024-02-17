<?php

include_once "db.php";

if(isset($_POST['subject'])){

    $Que->save(['text'=>$_POST['subject'],'vote'=>0,'subject_id'=>0]);
    $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];
}

if(isset($_POST['opt'])){
foreach($_POST['opt'] as $opt){

    $Que->save(['text'=>$opt,'subject_id'=>$subject_id,'vote'=>0]);

}

}

to("../back.php?do=que");