<div class="ct"><input type="button" value="新增管理員" onclick="location.href='?do=add'"></div>

<div class="ct">
    <table class="all">
        <tr class="tt">
            <td class="pp" style="width:33%">帳號</td>
            <td class="pp" style="width:33%">密碼</td>
            <td class="pp" style="width:33%">管理</td>
        </tr>
        <?php
        $rows=$Admin->all();
        foreach($rows as $row){
        ?>
        <tr class="pp">
            <td><?=$row['acc'];?></td>
          <td><?=str_repeat("*",strlen($row['pw']))?></td>
            <td>

            <?php
            if($row['acc']=='admin'){
                echo "此帳號為最高權限";
            }else{
                ?>
<input type="button" value="修改" onclick="location.href='?do=edit_admin&id=<?=$row['id'];?>'">
<input type="button" value="刪除" onclick="location.href='./api/del_admin.php?id=<?=$row['id'];?>'">
                <?php
            }
            ?>
            </td>
        </tr>
        <?php
        }?>
    </table>
</div>