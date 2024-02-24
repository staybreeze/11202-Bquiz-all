<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/edit_news.php" method="post">
        <table>
            <tr>
                <th style="width:10%"><b>編號</b></th>
                <th style="width:70%;text-align:center"><b>標題</b></th>
                <th style="width:10%"><b>顯示</b></th>
                <th style="width:10%"><b>刪除</b></th>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = ($_GET['p']) ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all("limit $start,$div");
            foreach ($rows as $idx => $row) {
            ?>
                <tr class="ct">
                    <td style="background-color:gainsboro"><?= $idx + 1 ?></td>
                    <td class="news">
                        <div><?= $row['title']; ?>
                        </div>

                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" id="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" id="del[]" value="<?= $row['id']; ?>">
                        <input type="hidden" name="id[]" id="id[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
            <?php
            } ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>
    <?php
    if (($now - 1) > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev' class='ct'><</a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:15px';
        echo "<a href='?do=news&p=$i' class='ct'>$i</a>";
    }
    if (($now + 1) <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next' class='ct'>></a>";
    }
    ?>
</fieldset>