<?php
include_once "db.php";

$Type->del($_GET['id']);
to("../back.php?do=th");