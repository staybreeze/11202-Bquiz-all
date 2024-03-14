<?php
include_once "../api/db.php"
?>

<h2 class="ct">編輯次選單</h2>
<hr>
<form action="./api/submenu.php" method="post">
    <!-- <div class="ct">標題區圖片: <input type="file" name="img" id=""></div> -->

    <table class="ct">
        <tr  id="box">
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows = $Menu->all(['menu_id' => $_GET['id']]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
                <td><input type="text" name="href[]" value="<?= $row['href']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </tr>
        <?php
        } ?>

    </table>

    <div class="ct">
        <input type="hidden" name="sub_id" value="<?= $_GET['id']; ?>">

        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>

</form>

<script>
    function more() {
        let box = `    <tr>
        <td><input type="text" name="add_text[]" id=""></td>
        <td><input type="text" name="add_href[]" id=""></td>
    </tr>`

        $("#box").after(box)
    }
</script>