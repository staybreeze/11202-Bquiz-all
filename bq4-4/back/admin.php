<div class="ct">
<input type="button" value="新增管理員" onclick="location.href='?do=add_admin'">
</div>

<table class="all">
    <tr>
        <td class="tt"> 帳號</td>
        <td class="tt">密碼</td>
        <!-- <td class="tt">註冊日期</td> -->
        <!-- <td class="tt">狀態</td> -->
        <td class="tt">管理</td>
    </tr>
    <?php
        $rows = $Admin->all();
        foreach ($rows as $row) {

        ?>
    <tr>
        <!-- <td class="pp"><?=$row['name'];?></td> -->
        <td class="pp"><?=$row['acc'];?></td>
        <td class="pp"><?=str_repeat("*",strlen($row['pw']));?></td>
        <!-- <td class="pp"><?=($row['sh']==1)?'販售中':'已下架';?></td> -->
        <td class="pp">
<?php
if($row['acc']=='admin'){
    echo "此帳號為最高權限";
}else{
?>
        <input type="button" value="修改" onclick="location.href='?do=edit_admin&id=<?=$row['id'];?>'">
            <input type="button" value="刪除" onclick="location.href='./api/del_admin.php?id=<?=$row['id'];?>'">
          <?php
        }?>
        </td>
    </tr>
    <?php
    }?>
</table>