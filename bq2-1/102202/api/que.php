<?php
include_once "db.php";

if (isset($_POST['sub'])) {
    $Que->save(['text' => $_POST['sub'], 'subject_id' => 0, 'vote' => 0]);
    $subject_id = $Que->find(['text' => $_POST['sub']])['id'];
}

if (isset($_POST['opt'])) {

    foreach ($_POST['opt'] as $opt) {
        $Que->save(['text' => $opt, 'subject_id' => $subject_id, 'vote' => 0]);
    }
}

to("../back.php?do=que");