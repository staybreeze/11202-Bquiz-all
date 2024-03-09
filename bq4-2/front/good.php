<?php
$row=$Good->find($_GET['id']);
$qt=0;
$big=$Type->find($row['big']);
$mid=$Type->find($row['mid']);

?>
<img src="./img/<?=$row['img'];?>" width="100px" alt="">
<div>分類:<?=$big['text']?>><?=$mid['text'];?></div>
<div>編號:<?=$row['no']?></div>
<div>價格:<?=$row['price']?></div>
<div>詳細說明:<?=$row['intro']?></div>
<div>庫存量:<?=$row['stock']?></div>
<input type="hidden" id="id" value="<?=$row['id'];?>">

<div class="tt">購買數量:<input type="text" name="qt" id="qt" >
<img src="./img/0402.jpg"  onclick="buy()"></div>

<script>
function buy(){
    let qt=$("#qt").val()
    let id=$("#id").val()
    location.href=`./api/add_to_cart.php?id=${id}&qt=${qt}`
}

</script>