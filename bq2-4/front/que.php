<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>

    <table class="ct">
        <tr class="ct">
            <td style="width:10%">編號</td>
            <td style="width:60%">問卷題目</td>
            <td style="width:10%">投票總數</td>
            <td style="width:10%">結果</td>
            <td style="width:10%">狀態</td>
        </tr>
        <?php

        $rows = $Que->all(['subject_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <td class="tag" data-id="<?= $row['id']; ?>"><?= $idx + 1; ?></td>
                <td>
                    <div class="a" id="a<?= $row['id']; ?>"><?= $row['text']; ?></div>

                </td>
                <td><?= $row['vote']; ?></td>
                <td><a href="?do=result&id=<?= $row['id']; ?>">結果</a></td>
                <td>
                    <?php

                    if (isset($_SESSION['user'])) {
                    ?>
                        <a href="?do=vote&id=<?= $row['id']; ?>">參與投票</a>
                    <?php
                    } else {

                        echo '請先登入';
                    }

                    ?>

                </td>
            </tr>
        <?php
        } ?>
    </table>

</fieldset>