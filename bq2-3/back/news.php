<style>
    .a{
        position: fixed;
        color:aliceblue;
        background-color: black;
        width: 300px;
    }
    
</style>

<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <form action="./api/edit.php" method="post">
    <table style="width:95%;text-align:center">
        <tr>
            <td style="width:5%"><b>標題</b></td>
            <td style="width:60%"><b>內容</b></td>
            <td style="width:10%"><b>顯示</b></td>
            <td ><b>刪除</b></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);

        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td style="background-color:gainsboro" class="tag" data-id="<?= $row['id']; ?>"><?= $idx+1; ?></td>
                <td style="position:relative">
                    <div id="s<?= $row['id']; ?>" class="s">
                        <?=$row['title']; ?></div>
                </td>
                <td><input type="checkbox" name="sh[]" id="" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                </td>
                <td><input type="checkbox" name="del[]" id="" value="<?=$row['id'];?>">
                <td><input type="hidden" name="id[]" id="" value="<?=$row['id'];?>">
                </td>
            </tr>
        <?php


        } ?>
    </table><div class="ct">
    <?php

    if (($now - 1) > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev'><</a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:18px';
        echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a>";
    }

    if (($now + 1) <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next'>></a>";
    } ?></div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
    </form>
</fieldset>
<script>
    $('.tag').hover(function() {
        $('.s').show();
        $('.a').hide();
        let id = $(this).data('id')
        $('#s' + id).hide()
        $('#a' + id).show()
    })
</script>