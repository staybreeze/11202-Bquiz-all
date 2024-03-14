<?php
include_once "db.php";

$_SESSION['cart'][]=[
'id'=>$_GET['id'],
'qt'=>$_GET['qt']

];

to("../index.php?do=buycart");