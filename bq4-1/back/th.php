<h2 class="ct">商品分類</h2>

<div class="ct">新增大分類<input type="text" id="big"><input type="button" value="新增" onclick="add('big')"></div>
<div class="ct">新增中分類
    <select name="big_list" id="bigList"></select>
    <input type="text" id="mid">
    <input type="button" value="新增" onclick="add('mid')">
</div>

<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><?= $big['name']; ?></td>
            <td class="tt">
            <input type="button" value="修改" onclick="edit(this,<?= $big['id']; ?>)">
                <input type="button" value="刪除" onclick="location.href='./api/del_type.php?id=<?= $big['id']; ?>'">
            </td>
        </tr>

        <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp ct"><?= $mid['name']; ?></td>
                <td class="pp">
                    <input type="button" value="修改" onclick="edit(this,<?= $mid['id']; ?>)">
                    <input type="button" value="刪除" onclick="location.href='./api/del_type.php?id=<?= $mid['id']; ?>'">
                </td>
            </tr>
    <?php
        }
    } ?>
</table>

<script>
    getTypes(0)


    function edit(dom, id) {
        console.log(dom)
        let name = prompt("請輸入您要修改的名稱:", `${$(dom).parent().prev().text()}`)
        $.post('./api/edit_type.php', {
            name: name,
            id: id
        }, (res) => {
            location.reload();
        })
    }

    function add(type) {
        let name
        let big_id

        let bigList = $('#bigList').val();

        switch (type) {
            case "big":
                name = $('#big').val();
                big_id = 0;
                break;
            case "mid":
                name = $('#mid').val();
                big_id = $('#bigList').val()
                break;

        }
        $.post('./api/add_type.php', {
            name: name,
            big_id: big_id
        }, (res) => {

            location.reload();
        })
    }

    function getTypes(big_id) {
        $.post('./api/get_opt.php', {
            big_id: big_id
        }, (res) => {

            $('#bigList').html(res)

        })

    }
</script>


<h2 class="ct">商品管理</h2>
<div class="ct">
<input type="button"  value="新增商品" onclick="location.href='?do=add_good'"></div>

<table class="all">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">庫存量</td>
        <td class="tt">狀態</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    
    $rows=$Good->all();
    foreach($rows as $row){?>
    <tr>
        <td class="pp"><?=$row['no'];?></td>
        <td class="pp"><?=$row['name'];?></td>
        <td class="pp"><?=$row['stock'];?></td>
        <td class="pp">
        <?=($row['sh']>0)?'販售中':'已下架';?>
        </td>
        <td class="pp">
        <div><input type="button" value="修改"onclick="location.href='?do=edit_good&id=<?=$row['id'];?>&big=<?=$row['big'];?>&mid=<?=$row['mid'];?>'">
        <input type="button" value="刪除"onclick="location.href='./api/del_good.php?id=<?=$row['id'];?>'"></div>
        <div><input type="button" value="上架" onclick="location.href='./api/sh.php?id=<?=$row['id'];?>&sh=1'">
        <input type="button" value="下架" onclick="location.href='./api/sh.php?id=<?=$row['id'];?>'"></div>
        
    </td>
    </tr>
    <?php
}?>
</table>