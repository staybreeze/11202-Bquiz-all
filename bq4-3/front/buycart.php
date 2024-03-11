<h2 class="ct"><?=$_SESSION['user'];?>的購物車</h2>

<table style="margin-left:100px">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">數量</td>
        <td class="tt">庫存量</td>
        <td class="tt">單價</td>
        <td class="tt">小計</td>
        <td class="tt">刪除</td>
    </tr>
    <?php
    // dd($_SESSION['cart']);
    foreach($_SESSION['cart'] as $cart){
    //   dd($cart);
    $row=$Good->find($cart['id']);
    $sum=$row['price']*$cart['qt'];
    ?>
    <tr>
        <td class="pp"><?=$row['no'];?></td>
        <td class="pp"><?=$row['text'];?></td>
        <td class="pp"><?=$cart['qt'];?></td>
        <td class="pp"><?=$row['stock'];?></td>
        <td class="pp"><?=$row['price'];?></td>
        <td class="pp"><?=$sum;?></td>
        <td class="pp">
<a href="./api/del_cart"><img src="./img/0415.jpg" alt=""></a>

        </td>
    </tr>
    <?php
    }?>
</table>

<div class="ct">
    <a href="index.php"><img src="./img/0411.jpg" alt=""></a>
    <a href="?do=check"><img src="./img/0412.jpg" alt=""></a>
</div>