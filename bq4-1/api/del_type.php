<?php
include_once "db.php";

$Type->del($_GET);

to("../back.php?do=th");
