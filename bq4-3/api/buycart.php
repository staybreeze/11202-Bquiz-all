<?php
include_once "db.php";


// $_SESSION['cart']['id']=$_GET['id'];
$_SESSION['cart'][]=[
    
    'id'=>$_GET['id'],
    'qt'=>$_GET['qt']];

dd($_SESSION);

to("../index.php?do=buycart");