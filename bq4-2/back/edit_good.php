<h2 class="ct">修改商品</h2>
<form action="./api/edit_good.php" method="post">
    <table class="all">

    <?php
    $row=$Good->find($_GET['id']);
    ?>
    <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp"> <select name="big" id="big">
                <option value="">請選擇一項</option>
            <?php
                $bigs=$Type->all(['big_id'=>0]);
                foreach($bigs as $big){
                ?>
                <option value="<?=$big['id'];?>"><?=$big['text'];?></option>
                <?php
                }?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"> <select name="mid" id="mid">
            <option value="">請選擇一項</option>
            </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?=$row['no'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="namne" value="<?=$row['name'];?>"> </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" id="price"value="<?=$row['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" id="spec"value="<?=$row['spec'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" id="stock"value="<?=$row['stock'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
       
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea name="intro" id="" cols="30" rows="10"><?=$row['intro'];?>"</textarea></td>
        </tr>

    </table>
    <div class="ct">

        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="submit" value="修改">|<input type="reset" value="重置">|<input type="reset" value="返回" onclick="location.href='?do=th'">
    </div>
</form>
<script>
    // $.post('./api/get_type.php',{big_id:1},(res)=>{
    //     $('#mid').html(res)});
$("#big").change(function(){
    $.post('./api/get_type.php',{big_id:$('#big').val()},(res)=>{
      
        $('#mid').html(res)
        // location.reload()
    })
})

</script>

