<h2 class="ct">商品分類</h2>

<div class="ct">
    新增大分類

    <input type="text" name="big" id="big">
    <input type="button" value="新增" onclick="add('big')">
</div>
<div class="ct">
    新增中分類
    <select name="big_id" id="bigId">
        <?php
        $rows = $Type->all(['big_id' => 0]);
        foreach ($rows as $row) {
        ?>
            <option value="<?= $row['id']; ?>"><?= $row['text']; ?></option>
        <?php

        } ?>
    </select>
    <input type="text" name="mid" id="mid">
    <input type="button" value="新增" onclick="add('mid')">
</div>


<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><?= $big['text']; ?></td>
            <td class="tt ct">
                <input type="button" value="修改" onclick="edit(this,<?=$big['id'];?>)">
                <input type="button" value="刪除" onclick="location.href='./api/del_type.php?id=<?=$big['id'];?>)'">

            </td>
        </tr>
        <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp ct"><?= $mid['text']; ?></td>
                <td class="pp ct">
                    <input type="button" value="修改" onclick="edit(this,<?=$mid['id'];?>)">
                    <input type="button" value="刪除" onclick="location.href='./api/del_type.php?id=<?=$mid['id'];?>)'">

                </td>
            </tr>
    <?php
        }
    } ?>
</table>

<h2 class="ct">商品管理</h2>


<div class="ct"><input type="button" value="新增商品" onclick="location.href='?do=add_good'"></div>


<table class="all">

<tr>
    <td class="tt">編號</td>
    <td class="tt">商品名稱</td>
    <td class="tt">庫存量</td>
    <td class="tt">狀態</td>
    <td class="tt">遭做</td>
</tr>
    <?php
    $rows = $Good->all();
    foreach ($rows as $row) {
    ?>

        <tr>
        <td class="pp"><?= $row['no']; ?></td>
            <td class="pp"><?= $row['name']; ?></td>
            <td class="pp"><?= $row['stock']; ?></td>
            <td class="pp"><?=($row['sh']==1)?'販售中':'已下架';?></td>


            <td class="pp">
                <input type="button" value="修改" onclick="location.href='?do=edit_good&id=<?=$row['id'];?>'">
                <input type="button" value="刪除" onclick="location.href='./api/del_good.php?id=<?=$row['id'];?>'">
                <input type="button" value="上架" onclick="location.href='./api/sh.php?sh=1&id=<?=$row['id'];?>'">
                <input type="button" value="下架" onclick="location.href='./api/sh.php?sh=0&id=<?=$row['id'];?>'">
            </td>
        </tr>

    <?php
        
    } ?>
</table>

<script>
    function add(type) {
        let big = $("#big").val();
        let mid = $("#mid").val();
        let bigId = $("#bigId").val();
        switch (type) {
            case "big":
                $.post('./api/add_type.php', {
                    text: big
                }, (res) => {
                    location.reload();
                })
                break;
            case "mid":

                $.post('./api/add_type.php', {
                    text: mid,
                    big_id: bigId
                }, (res) => {
                    console.log(res)
                    location.reload();
                })
                break;
        }
    }

    function edit(dom,id){
        let text=$(dom).parent().prev().text()
        let name=prompt("HI",text)
        $.post('./api/edit_type.php',{name:name,id:id},(res)=>{
      
            location.reload()
        })

    }
</script>