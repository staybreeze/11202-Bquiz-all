<h2 class="ct"><?=$_SESSION['user'];?>的購物車</h2>

<table style="width:100%">
    <tr>
        <td class="tt ct" style="width:10%">編號</td>
        <td class="tt ct" style="width:40%">商品名稱</td>
        <td class="tt ct" style="width:10%">數量</td>
        <td class="tt ct" style="width:10%">庫存量</td>
        <td class="tt ct" style="width:10%">單價</td>
        <td class="tt ct" style="width:10%">小計</td>
        <td class="tt ct" style="width:10%">刪除</td>
    </tr>
    <?php
    if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $idx =>$cart){
   
        $row=$Good->find($cart['id']);
        $sum=$row['price']*$cart['qt'];
    ?>
<tr>
    <td class="pp ct    "><?=$row['no'];?></td>
    <td class="pp ct    "><?=$row['text'];?></td>
    <td class="pp ct    "><?=$cart['qt'];?></td>
    <td class="pp ct    "><?=$row['stock'];?></td>
    <td class="pp ct    "><?=$row['price'];?></td>
    <td class="pp ct    "><?=$sum;?></td>
    <td class="pp ct    ">
        <img src="./img/0415.jpg" onclick="location.href='./api/del_cart.php?id=<?=$idx;?>'">
    </td>
</tr>
<?php
    }}
?>
</table>

<div class="ct">

<img src="./img/0411.jpg" onclick="location.href='index.php'">
<img src="./img/0412.jpg" onclick="location.href='?do=check'">

</div>