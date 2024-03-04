<?php
include_once "db.php";

unset($_SESSION['user'],$_SESSION['admin']);
to("../index.php");