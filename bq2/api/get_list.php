<?php

include_once "db.php";

$rows=$New->all(['type'=>$_GET['type'],'sh'=>1]);
foreach($rows as $row){
    echo "<a href='Javascript:getNews({$row['id']})' style='display:block'>";
    echo $row['title'];
    echo "</a>";
    
}
