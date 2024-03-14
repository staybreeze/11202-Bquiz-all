<?php
include_once "db.php";

$Admin->del($_GET['id']);
to("../back.php?do=admin");