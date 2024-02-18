<style>
    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 300px;
        position: fixed;
        display: none;
        z-index: 9999;

    }
</style>


<fieldset>
    <legend>目前位置:首頁>人氣文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th style="width:30%"><b>標題</b></th>
            <th style="width:50%"><b>內容</b></th>
            <th"><b>人氣</b></th>
        </tr>
        <?php

        $total = $News->count(['sh' => 1]);
        $div = 3;
        $pages = ceil($total / $div);
        $now = ($_GET['p']) ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td>
                    <div class="title" data-id="<?= $row['id']; ?>"><?= $row['title']; ?></div>
                </td>
                <td style="position:relative">
                    <div><?= mb_substr($row['article'], 0, 25); ?>...</div>
                    <div class="pop" id="p<?=$row['id'];?>">
                        <h3 style="color:skyblue"><?= $row['title']; ?></h3>
                        <pre><?= $row['article']; ?></pre>
                    </div>
                </td>
                <td>
                    <?= $row['good']; ?>個人說
                    <img src="./img/02B03.jpg" width="25px">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
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
    <div>
        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;
            echo "<a href='?do=pop&p=$prev'><</a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($i == $now) ? '24px' : '18px';
            echo "<a href='?do=pop&p=$i' style='font-size:$fontsize'>$i</a>";
        }

        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'>></a>";
        }
        ?>

    </div>
</fieldset>
<script>
    function good(news) {
        $.post("./api/good.php", {
            news
        }, () => {
            location.reload(true);
        })
    }

    $(".title").hover(
        function() {
            console.log('hi')
            $(".pop").hide()
            let id = $(this).data("id")
            console.log(id)
            $("#p"+id).show()
        }
    )
</script>