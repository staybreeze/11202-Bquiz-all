<h3 class="ct">會員管理</h3>

<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    $rows=$Mem->all();
    foreach($rows as $row){
    
    ?>
    <tr>
    <td class="pp"><?=$row['name'];?></td>
        <td class="pp"><?=$row['acc'];?></td>
        <td class="pp"><?=$row['regdate'];?></td>
        <td class="pp">
            <button onclick="location.href='?do=edit_mem&id=<?=$row['id'];?>'">修改</button>
        <button onclick="del('mem',<?=$row['id'];?>)">刪除</button>

        </td>
    </tr>
    <?php
    
    }?>
</table>

<div class="ct">
    <button onclick="location.href='back.php'">返回</button>
</div>