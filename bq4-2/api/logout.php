<?php
include_once "db.php";

// 移除指定的 session 變數
unset($_SESSION['user']);
unset($_SESSION['cart']);
unset($_SESSION['admin']);

// 執行轉向操作到指定的頁面
header('Location: ../index.php');
exit(); // 確保在執行 header 之後沒有任何的輸出
?>
