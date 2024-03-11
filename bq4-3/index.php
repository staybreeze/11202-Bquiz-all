<?php
include_once "./api/db.php"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
        <script src="./js/js.js"></script>
        <script src="./js/jquery-3.4.1.min.js"></script>
</head>

<body>
        <iframe name="back" style="display:none;"></iframe>
        <div id="main">
                <div id="top">
                        <a href="?">
                                <img src="./img/0416.jpg">
                        </a>
                        <div style="padding:10px;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |

                                <?php
                                if (isset($_SESSION['user'])) {
                                        echo ' <a href="?do=login">會員登入</a> |';
                                } else {
                                        echo ' <a href="./apu/logout.php">會員登出</a> |';
                                }
                                ?>

                                <?php
                                if (isset($_SESSION['admin'])) {
                                        echo ' <a href="back.php">返回管理</a> ';
                                } else {
                                        echo '<a href="?do=admin">管理登入</a>';
                                }
                                // dd($_SESSION);
                                ?>

                        </div>
                        情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                                <a href="?type=0">全部商品(<?= $Good->count(['sh' => 1]); ?>)</a>
                                <?php
                                $rows = $Type->all(['big_id' => 0]);
                                foreach ($rows as $row) {
                                ?>
<div class="ww">
        <a href="?type=<?=$row['id'];?>"><?=$row['text'];?>(<?= $Good->count(['sh' => 1,'big'=>$row['id']]); ?>)</a>
        <div class="s">
        <?php
                                $mids = $Type->all(['big_id' => $row['id']]);
                                foreach ($mids as $mid) {
                                ?>
               <a href="?type=<?=$mid['id'];?>"><?=$mid['text'];?>(<?= $Good->count(['sh' => 1,'mid'=>$mid['id']]); ?>)</a>
                <?php
                }?>
        </div>
</div>
                                <?php
                                } ?>


                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                        <?php

                        $do = ($_GET['do']) ?? 'main';
                        $file = "./front/{$do}.php";
                        if (file_exists($file)) {
                                include $file;
                        } else {
                                include "./front/main.php";
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(./img/bot.png); color:#FFF;" class="ct">
                        頁尾版權 : </div>
        </div>

</body>

</html>