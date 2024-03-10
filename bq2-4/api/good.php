<?php
include_once "db.php";

if($Log->count(['acc'=>$_SESSION['user']])>0){
$Log->del(['acc'=>$_SESSION['user']]);
$row=$News->find($_POST['id']);
$row['good']--;
$News->save($row);
    
}else{

    $Log->save([
'news'=>$_POST['id'],
'acc'=>$_SESSION['user']

    ]);
    $row=$News->find($_POST['id']);
$row['good']++;
$News->save($row);
}