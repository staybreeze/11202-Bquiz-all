<?php
include_once "db.php";

$id=$_GET['id'];
$qt=$_GET['qt'];
$_SESSION['cart'][] =[
    'id' => $id,
    'quantity' => $qt,
];

dd($_SESSION);

if(!isset($_SESSION['user'])){
    to("../index.php?do=login");
}else{
   to("../index.php?do=buycart"); 
}
