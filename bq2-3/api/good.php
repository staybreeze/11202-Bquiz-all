<?php
include_once "db.php";

if ($Log->count(['acc' => $_SESSION['user'], 'news' => $_POST['id']]) > 0) {
    $Log->del(['acc' => $_SESSION['user'], 'news' => $_POST['id']]);
    $news = $News->find($_POST['id']);
    $news['good']--;
    $News->save($news);
} else {
    $news = $News->find($_POST['id']);
    $news['good']++;
    $News->save($news);
    $Log->save(['acc' => $_SESSION['user'], 'news' => $_POST['id']]);
}
