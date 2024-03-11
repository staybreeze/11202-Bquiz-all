<?php
include_once "db.php";

$Mem->del($_GET['id']);

to("../back.php?do=mem");