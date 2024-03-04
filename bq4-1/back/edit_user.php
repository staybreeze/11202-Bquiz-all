<h2 class="ct">新增管理帳號</h2>
<form action="./api/edit_user.php" method="post">
<table class="ct all">
    <?php
    $row=$User->find($_GET['id']);

    ?>
<tr>
    <td class="tt">帳號</td>
    <td class="pp"><input type="text" name="acc" value="<?=$row['acc'];?>"></td>
</tr>
<tr>
    <td class="tt">密碼</td>
    <td class="pp"><input type="password" name="pw" value="<?=$row['pw'];?>"></td>
</tr>
<tr>
    <td class="tt">姓名</td>
    <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
</tr>
<tr>
    <td class="tt">電子信箱</td>
    <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
</tr>
<tr>
    <td class="tt">地址</td>
    <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
</tr>
<tr>
    <td class="tt">電話</td>
    <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
</tr>

</table>
<div class="ct">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" value="修改">|
    <input type="reset" value="重置">
</div>
</form>