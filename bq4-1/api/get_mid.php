<?php
include_once "db.php";

$rows=$Type->all(['big_id'=>$_POST['id']]);
foreach($rows as $row){
echo "<option value='{$row['id']}'>{$row['name']}</option>";

}
