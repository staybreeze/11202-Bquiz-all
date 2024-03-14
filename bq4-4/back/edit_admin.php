<h2 class="ct">修改管理員權限</h2>
<form action="./api/edit_admin.php" method="post">
    <table class="all">


<?php

$row=$Admin->find($_GET['id']);
$row['pr']=unserialize($row['pr']);
?>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?=$row['acc'];?>">
                
            
            </td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" value="<?=$row['pw'];?>">
       </td>
        </tr>
        <tr>
            <td class="tt">權限</td>
            <td class="pp">
            <input type="checkbox" name="pr[]"value="1" <?=(in_array(1,$row['pr']))?'checked':'';?>>商品分類與管理<br>
            <input type="checkbox" name="pr[]"value="2"<?=(in_array(2,$row['pr']))?'checked':'';?>>訂單管理<br>
            <input type="checkbox" name="pr[]"value="3"<?=(in_array(3,$row['pr']))?'checked':'';?>>會員管理<br>
            <input type="checkbox" name="pr[]"value="4"<?=(in_array(4,$row['pr']))?'checked':'';?>>頁尾版權區管理<br>
            <input type="checkbox" name="pr[]"value="5"<?=(in_array(5,$row['pr']))?'checked':'';?>>最新消息管理
        
        </td>
        </tr>
     


    </table>

    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="submit" value="修改">|
        <input type="reset" value="重置">
        <!-- <input type="button" value="取消" onclick="location.href='?do=user'"> -->
    </div>
</form>
