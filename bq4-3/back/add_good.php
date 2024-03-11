<h2 class="ct">新增商品</h2>
<form action="./api/add_good.php" method="post">
<table class="all">
    <tr>
        <td class="tt">所屬大分類</td>
        <td class="pp"><select name="big" id="big">
        <?php
$rows=$Type->all(['big_id'=>0]);
foreach($rows as $row){

?>
<option value="<?=$row['id'];?>"><?=$row['text'];?></option>
<?php
}?>
        </select></td>
    </tr>
    <tr>
        <td class="tt">所屬中分類</td>
        <td class="pp">
            <select name="mid" id="mid">


            </select>
        </td>
    </tr>
    <tr>
        <td class="tt">商品編號</td>
        <td class="pp">完成分類後自動分配</td>
    </tr>
        <tr>
        <td class="tt">商品名稱</td>
        <td class="pp"><input type="text" name="text" id="text"></td>
    </tr>
    <tr>
        <td class="tt">商品價格</td>
        <td class="pp">
            <input type="text" name="price" id="price">
        </td>
    </tr>
    <tr>
        <td class="tt">規格</td>
        <td class="pp">
            <input type="text" name="spec" id="spec">
        </td>
    </tr>
    <tr>
        <td class="tt">庫存量</td>
        <td class="pp">
        <input type="text" name="stock" id="stock">
        </td>
    </tr>
    <tr>
        <td class="tt">商品圖片</td>
        <td class="pp"><input type="file" name="img" id="img"></td>
    </tr>
    <tr>
        <td class="tt">商品介紹</td>
        <td class="pp">
            <textarea name="intro" id="" cols="30" rows="10"></textarea>
        </td>
    </tr>
  
</table>
<div class="ct">
    <input type="submit" value="新增">|
    <input type="reset" value="重置">|
    <input type="button" value="返回" onclick="location.href='?do=th'">
</div>
</form>
<script>

$.post('./api/get_type.php',{big_id:1},(res)=>{
            $("#mid").html(res)
        })
    $("#big").change(function(){
        $.post('./api/get_type.php',{big_id:$("#big").val()},(res)=>{
            $("#mid").html(res)
        })
    })
</script>