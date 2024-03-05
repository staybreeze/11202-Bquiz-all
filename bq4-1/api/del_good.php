<?php
include_once "db.php";

$Good->del($_GET);

to("../back.php?do=th");
