<h2 class="ct">
<?php
$table=$_GET['table'];
switch($table){
    case"title":
        echo "<h2 class='ct'>更換標題區圖片</h2>";
        break;
}
?>    

</h2><hr>
<form action="./api/add.php" method="post">
<div class="ct">
    
<?php

switch($table){
    case"title":
        echo "<h2>標題區圖片: </h2>";
        break;
}
?>    <input type="file" name="img" id=""></div>

<div class="ct">
<input type="hidden" name="id" value="<?=$_GET['id'];?>">
<input type="hidden" name="table" value="<?=$_GET['table'];?>">
<input type="submit" value="新增">
<input type="reset" value="重置">
</div>

</form>