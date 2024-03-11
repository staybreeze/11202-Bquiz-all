<?php
include_once "db.php";

unset($_SESSION['admin']);
unset($_SESSION['cart']);
unset($_SESSION['uset']);

to("../index.php");
?>