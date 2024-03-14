<?php
include_once "db.php";

dd($_GET['id']);

unset($_SESSION['cart'][$_GET['id']]);

to("../index.php?do=buycart");