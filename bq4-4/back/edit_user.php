<h2 class="ct">編輯會員資料</h2>
<form action="./api/edit_user.php" method="post">
    <table class="all">


<?php

$row=$User->find($_GET['id'])?>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><?=$row['acc'];?></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><?=str_repeat("*",strlen($row['pw']));?></td>
        </tr>
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$row['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt">地址</td>
            <td class="pp"><input type="text" name="addr" id="addr"  value="<?=$row['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$row['tel'];?>"></td>
        </tr>


    </table>

    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="submit" value="編輯">|
        <input type="reset" value="重置">|
        <input type="button" value="取消" onclick="location.href='?do=user'">
    </div>
</form>
