<?php
include_once "db.php";

if (isset($_POST['subject'])) {
    $Que->save(['text' => $_POST['subject'], 'subject_id' => 0, 'vote' => 0]);
    $que = $Que->find(['text' => $_POST['subject']]);
    $subject_id = $que['id'];
}

if (isset($_POST['opt'])) {
    foreach ($_POST['opt'] as $que) {
        $Que->save(['text' => $que, 'subject_id' => $subject_id, 'vote' => 0]);
    }
}

to("../back.php?do=que");