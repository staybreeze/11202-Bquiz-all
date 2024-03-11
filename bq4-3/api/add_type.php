<?php
include_once "db.php";


if(isset($_POST['big_id'])){
    $Type->save([
        'text'=>$_POST['mid'],
        'big_id'=>$_POST['big_id'],
    ]);
}else{
    $Type->save([
        'text'=>$_POST['big'],
        'big_id'=>0,
    ]);

}