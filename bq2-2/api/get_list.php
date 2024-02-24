<?php
include_once "db.php";

$news=$News->all(['type'=>$_POST['type']]);
foreach($news as $n){
echo"<a href='Javascript:getNews({$n['id']})' style='display:block'>{$n['title']}</a><br>";}