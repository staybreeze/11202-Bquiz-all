<form action="./api/edit_news.php" method="post">
    <table>
        <tr>
            <td style="width:25%"><b>編號</b></td>
            <td style="width:25%"><b>標題</b></td>
            <td style="width:25%"><b>顯示</b></td>
            <td style="width:25%"><b>刪除</b></td>
        </tr>
        <?php
        $total = $New->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $New->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]">
                </td>
                <td><input type="checkbox" name="del[]">
                </td>
                <input type="hidden" name="<?= $row['id']; ?>">
            </tr>

        <?php
        } ?>

    </table> <div  style="text-align:center">
    <input type="submit" value="修改確定"></div>
</form>
<div class="ct">
    <?php
    if (($now - 1) > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev'><</a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? 'fontsize:24px' : 'fontsize:6px';
        echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a> ";
    }

    if (($now + 1) <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next'>></a>";
    }
    ?>
</div>