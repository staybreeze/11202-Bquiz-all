<h2 class="ct">會員管理</h2>
<div class="ct">
    <table class="all">
        <tr class="tt">
            <td class="pp" style="width:25%">姓名</td>
            <td class="pp" style="width:25%">會員帳號</td>
            <td class="pp" style="width:25%">註冊日期</td>
            <td class="pp" style="width:25%">操作</td>
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row){
        ?>
        <tr class="pp">
            <td><?=$row['name'];?></td>
            <td><?=$row['acc'];?></td>
     
            <td><?=$row['date'];?></td>
            <td>
            <input type="button" value="修改" onclick="location.href='?do=edit_user&id=<?=$row['id'];?>'">
<input type="button" value="刪除" onclick="location.href='./api/del_user.php?id=<?=$row['id'];?>'">
            </td>
        </tr>
        <?php
        }?>
    </table>
</div>