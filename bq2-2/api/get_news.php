<?php
include_once "db.php";
$news=$News->find($_POST['id']);

echo nl2br($news['news']);