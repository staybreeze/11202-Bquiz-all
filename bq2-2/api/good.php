<?php
include_once "db.php";

if ($Log->count(['acc' => $_SESSION['user'], 'news' => $_POST['id']]) == 0) {
    $news=$News->find(['id' => $_POST['id']]);
    $news['good']++;
    $News->save($news);
    $Log->save(['acc' => $_SESSION['user'], 'news' => $_POST['id']]);
} else {
    $news=$News->find(['id' => $_POST['id']]);
    $news['good']--;
    $News->save($news);
    $Log->del(['acc' => $_SESSION['user'], 'news' => $_POST['id']]);
}
