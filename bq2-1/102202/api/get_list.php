<?php

include_once "db.php";

$rows=$News->all(['sh'=>1,'type'=>$_GET['type']]);
foreach($rows as $row){

    echo "<a href='Javascript:getNews({$row['id']})' style='display:block'>";
    echo $row['title'];
    echo "</a>";
}