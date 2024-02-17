<?php

include_once "db.php";

$email = $_POST['email'];
$res = $User->find(['email' => $email]); // 查询匹配邮箱的用户信息

if ($User->count(['email' => $email]) > 0) { // 统计匹配邮箱的用户记录数
    echo "您的密碼為:{$res['pw']}"; // 输出密码信息
} else {
    echo "查無此資料"; // 输出未找到数据的信息
}
?>
