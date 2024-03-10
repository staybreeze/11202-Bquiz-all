<fieldset>
    <legend>最新文章區管理</legend>
    <form action="./api/news.php" method="post">
    <table class="ct">
        <tr class="ct">
            <td style="width:25%">編號</td>
            <td style="width:25%">標題</td>
            <td style="width:25%">顯示</td>
            <td style="width:25%">刪除</td>
        </tr>
        <?php
        $total = $News->count();
        $div = 3;
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all("limit $start,$div");
        foreach ($rows as $idx=> $row) {
        ?>
            <tr>
                <td class="tag" data-id="<?= $row['id']; ?>"><?= $idx+1; ?></td>
                <td>
                    <div class="a" id="a<?= $row['id']; ?>"><?= $row['text']; ?></div>
                    
                </td>
                <td><input type="checkbox" name="sh[]"value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>></td>

                <td><input type="checkbox" name="del[]"value="<?=$row['id'];?>"></td>
                <input type="hidden" name="id[]"value="<?=$row['id'];?>">

            </tr>
        <?php
        } ?>
    </table>
    <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
    <div class="ct">
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=news&p=$prev'><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:18px';
            echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a>";
        }
        if ($now + 1 < $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
