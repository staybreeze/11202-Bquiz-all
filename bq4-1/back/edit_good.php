<h2 class="ct">修改商品</h2>
<form action="./api/edit_good.php" method="post" enctype="multipart/form-data">
    <table class="ct all">
        <?php
        $row=$Good->find($_GET['id']);
        $big=$Type->find($_GET['big']);
        $mid=$Type->find($_GET['mid']);
        ?>
        <tr>
            <td class="tt">所屬大分類</td>
            <td class="pp"><select name="big"  id="big">
          
                        <option class="big" value="<?= $big['id']; ?>"><?= $big['name']; ?></option>
               
                </select></td>
        </tr>
        <tr>
            <td class="tt">所屬中分類</td>
            <td class="pp"><select name="mid" id="mid">

     
                </select></td>


        </tr>

        <tr>
            <td class="tt">商品編號</td>
            <td class="pp"><?= $row['no']; ?></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?= $row['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text" name="price" id="price"value="<?= $row['price']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text" name="spec" id="spec" value="<?= $row['spec']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" id="stock" value="<?= $row['stock']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img" value="<?= $row['img']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><textarea name="intro" id="intro" cols="30" rows="10"><?= $row['intro']; ?></textarea></td>
        </tr>
        <?php
    ?>

    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="submit" value="修改">|
        <input type="reset" value="重置">|
        <input type="button" value="返回" onclick="location.href='?do=add_good'">
    </div>
</form>

<script>
            $.post('./api/get_mid.php', {
            id: $('#big').val()
        }, (res) => {
            $('#mid').html(res)
            console.log(res)
        })
    $('#big').change(function() {

        let id = $(this).val();
        console.log(id)
        $.post('./api/get_mid.php', {
            id: id
        }, (res) => {
            $('#mid').html(res)
            console.log(res)
        })
    })
</script>