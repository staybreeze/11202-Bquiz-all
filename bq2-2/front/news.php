<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>

    <table>
        <tr>
            <th style="width:30%"><b>標題</b></th>
            <th style="width:50%;text-align:center"><b>內容</b></th>
            <th></th>
        </tr>
        <?php
        $total = $News->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="tag" data-id="<?= $row['id']; ?>" style="background-color:gainsboro"><?= $row['title']; ?></td>
                <td class="news">
                    <div class="s" id="s<?= $row['id']; ?>"><?= mb_substr($row['news'], 0, 10); ?>...
                    </div>
                    <div class="a" id="a<?= $row['id']; ?>" style="display:none"><?= $row['news']; ?></div>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['acc' => $_SESSION['user'], 'news' => $row['id']]) > 0) {
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }

                    ?>
                </td>
            </tr>
        <?php
        } ?>
    </table>

    <?php
    if (($now - 1) > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev'><</a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:15px';
        echo "<a href='?do=news&p=$i'>$i</a>";
    }
    if (($now + 1) <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next'>></a>";
    }
    ?>
</fieldset>

<script>
    $('.tag').click(function() {
        $('.s').show();
        $('.a').hide();
        let id = $(this).data('id');
        $("#s" + id).hide();
        $("#a" + id).show();

    })
</script>