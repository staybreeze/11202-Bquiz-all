<?php
include_once "db.php";
if ($User->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]) > 0) {
    echo 1;
    $_SESSION['user']=$_POST['acc'];
} else {
    echo 0;
}
