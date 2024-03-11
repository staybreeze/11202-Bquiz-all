<?php
include_once "db.php";

unset($_SEESION['admin']);
unset($_SEESION['cart']);
unset($_SEESION['uset']);

to("../index.php");
?>