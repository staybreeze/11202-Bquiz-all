<h2 class="ct">會員管理</h2>

<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    $rows=$User->all();
    foreach($rows as $row){
    ?>
    <tr>
        <td class="pp"><?=$row['name'];?></td>
        <td class="pp"><?=$row['acc'];?></td>
        <td class="pp"><?=$row['date'];?></td>
        <td class="pp">
            <input type="button" value="修改"onclick="location.href='?do=edit&id=<?=$row['id'];?>'">
            <input type="button" value="刪除"onclick="location.href='./api/del_user.php?id=<?=$row['id'];?>'">
        </td>
    </tr>
    <?php
    
    }?>
</table>