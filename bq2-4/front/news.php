<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <table class="ct">
        <tr class="ct">
            <td style="width:33%">標題</td>
            <td style="width:33%">內容</td>
            <td style="width:33%"></td>
        </tr>
        <?php
        $total = $News->count();
        $div = 4;
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="tag" data-id="<?= $row['id']; ?>"><?= $row['text']; ?></td>
                <td>
                    <div class="a" id="a<?= $row['id']; ?>"><?= mb_substr($row['news'], 0, 10); ?>...</div>
                    <div class="s" id="s<?= $row['id']; ?>"><?= $row['news']; ?></div>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['acc' => $_SESSION['user'],'news'=>$row['id']]) > 0) {
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

<script>
    $('.s').hide()
    $('.tag').click(function() {
        let id = $(this).data('id')
        console.log(id)
        $('.s').hide()
        $('.a').show()
        $('#a' + id).hide()
        $('#s' + id).show()
    })
</script>