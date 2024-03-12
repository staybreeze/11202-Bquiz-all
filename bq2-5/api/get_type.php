<?php
include_once "db.php";

$rows=$News->all(['type'=>$_POST['type']]);
foreach($rows as $row){
    echo "<a href='Javascript:getNews({$row['id']})'>{$row['text']}</a><br>";
}
?>