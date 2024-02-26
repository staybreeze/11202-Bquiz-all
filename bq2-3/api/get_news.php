<?php
include_once "db.php";

$res=$News->find($_POST['id']);
echo nl2br($res['news']);