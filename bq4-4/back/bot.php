<h2 class="ct">編輯頁尾版權區</h2>
<form action="./api/bot.php" method="post">
    <table class="all">


        <?php

        $row = $Bot->find(1) ?>
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bot" value="<?= $row['bot']; ?>"></td>
        </tr>


    </table>

    <div class="ct">

        <input type="submit" value="編輯">|
        <input type="reset" value="重置">
    </div>

</form>