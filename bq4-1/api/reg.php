<?php
include_once "db.php";

if ($User->count(['acc' => $_POST['acc']]) > 0) {
    to("../index.php?do=login&res=帳號重複");
} else {
    if($_POST['acc']=='admin'){
        to("../index.php?do=login&res=此帳號不可使用"); 
    }else{
        $_POST['date']=date("Y/m/d");
          $User->save($_POST);
    to("../index.php?do=login&res=註冊成功"); 
    }
 
}
