<?php

include_once "../api/db.php" ?>
<h2 class="ct">新增次選單</h2>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">

    <table class="ct" id="more">
        <tr class="ct">
            <th>次選單名稱</th>
            <th>次選單連結網址</th>
            <th>刪除</th>
        </tr>
        <?php
        $rows=$Menu->all(['menu_id'=>$_GET['id']]);
        foreach($rows as $row){
        ?>
        <tr >
            <td><input type="text" name="text[]" id="" value="<?=$row['text'];?>"></td>
            <td><input type="text" name="href[]" id=""value="<?=$row['href'];?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>        <?php
        
        }?>



    </table>

    <div class="ct">
    <input type="hidden" name="sub_id" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="確定修改">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">

    </div>
</form>

<script>
    let box = `        <tr>
            <td><input type="text" name="add_text[]" id=""></td>
            <td><input type="text" name="add_href[]" id=""></td>

            </tr>`
   function more(){      $('#more').append(box)}
  

</script>