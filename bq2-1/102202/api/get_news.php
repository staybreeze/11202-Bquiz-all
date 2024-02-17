<?php

include_once "db.php";

$news=$News->find($_GET['id']);

// dd($news);
echo nl2br($news['article']);