

<h2 class="ct"><?=$_SESSION['user'];?>的購物車</h2>

<table class="ct" style="width:100%">
    <tr>
        <td class="tt" style="width:10%">編號</td>
        <td class="tt" style="width:20%">商品名稱</td>
        <td class="tt" style="width:10%">數量</td>
        <td class="tt" style="width:10%">庫存量</td>
        <td class="tt" style="width:10%">單價</td>
        <td class="tt" style="width:10%">小計</td>
        <td class="tt" style="width:10%">刪除</td>
    </tr>
    <tr>
<?php



foreach($_SESSION['cart'] as $id=> $cart){
    // dd($_SESSION['cart']);
    // dd($id);
    // dd($cart);
$row=$Good->find($cart['id']);

// dd($row);
$sum=$row['price']*$cart['quantity'];
?>
<td class="pp"><?=$row['no'];?></td>
<td class="pp"><?=$row['name'];?></td>
<td class="pp"><?=$cart['quantity'];?></td>
<td class="pp"><?=$row['stock'];?></td>
<td class="pp"><?=$row['price'];?></td>
<td class="pp"><?=$sum;?></td>
<td class="pp"><img src="./img/0415.jpg" onclick="location.href='./api/del_session.php?id=<?=$row['id'];?>'"></td>
</tr>
<?php


}?>

</table>