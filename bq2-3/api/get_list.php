<?php
include_once "db.php";

$news=$News->all(['type'=>$_POST['type']]);
foreach($news as $n){

    echo "<a href='Javascript:getnews({$n['id']})'>{$n['title']}</a><br>";
}
