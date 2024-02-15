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

    <table>
        <tr>
            <td style="width:30%"><b>標題</b></td>
            <td style="width:30%"><b>內容</b></td>
            <td><b>人氣</b></td>
        </tr>
        <?php
        $total = $New->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $New->all(['sh' => 1], " order by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="title" data-id="<?= $row['id']; ?>"><?= $row['title']; ?></td>
                <td style="position:relative">
                    <div>
                        <?= mb_substr($row['news'], 0, 25); ?>...
                    </div>
                    <div class="pop" id="p<?= $row['id']; ?>">
                        <h3 style="color:skyblue"><?= $row['title']; ?></h3>
                        <pre><?= $row['news']; ?></pre>
                    </div>
                </td>
                <td>
                    <span><?= $row['good']; ?></span>個人說
                    <img src="./img/02B03.jpg" alt="" width=25px>
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
            $fontsize = ($now == $i) ? 'fontsize:24px' : 'fontsize:6px';
            echo "<a href='?do=pop&p=$i' style='$fontsize'>$i</a> ";
        }

        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
<script>
//點擊事件改為hover
$(".title").hover(
    function(){
        //先將所有的pop隱藏起來
        $(".pop").hide()

        //取得點擊的id
        let id=$(this).data("id")
        
        //將對應的pop顯示出來
        $("#p"+id).show();
    }
)
</script>