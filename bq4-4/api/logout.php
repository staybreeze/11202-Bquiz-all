<?php
include_once "db.php";

unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['cart']);

to("../index.php");
?>