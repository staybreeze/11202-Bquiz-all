<?php

include_once "db.php";

// 如果要用{user:user}傳的話，必須這樣
// $user=$_POST['user'];
// unset($user['pw2']);
// $User->save($user);

// 如果用user傳的話

unset($_POST['pw2']);
$User->save($_POST);