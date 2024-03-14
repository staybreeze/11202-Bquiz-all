<?php
include_once "db.php";

$Good->del($_GET['id']);
to("../back.php?do=th");