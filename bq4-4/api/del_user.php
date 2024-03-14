<?php
include_once "db.php";

$User->del($_GET['id']);
to("../back.php?do=th");