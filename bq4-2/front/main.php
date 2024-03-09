<?php
if(isset($_GET['type'])){
   $type=$_GET['type']; 
}else{
    $type=0;  
}

$nav='';
$row=$Type->find($type);
if($type==0){
    $nav="全部商品";
}elseif($row['big_id']==0){
    $nav=$row['text'];
}else{
   $big=$Type->find(['id'=>$row['big_id']]);
    $nav=$big['text'].">".$row['text'];
}


?>
<h2><?=$nav;?></h2>
<?php


    $rows=$Good->all(['big'=>$type,'sh'=>1]);
    foreach($rows as $row){
?>

<a href="?do=good&id=<?=$row['id'];?>"><img src="./img/<?=$row['img'];?>" width="100px" alt=""></a>
<div class="tt"><?=$row['name'];?></div>
<div>價格:<?=$row['price']?><img src="./img/0402.jpg" style="float:right" alt="" onclick="location.href='./api/add_to_cart.php?id=<?=$row['id'];?>&qt=1'"></div>
<div>規格:<?=$row['spec']?></div>
<div>簡介:<?=mb_substr($row['intro'],0,25)?>...</div>
<?php
}
    ?>


<?php


    $rows=$Good->all(['mid'=>$type,'sh'=>1]);
    foreach($rows as $row){
?>

<a href="?do=good&id=<?=$row['id'];?>"><img src="./img/<?=$row['img'];?>" width="100px" alt=""></a>
<div class="tt"><?=$row['name'];?></div>
<div>價格:<?=$row['price']?><img src="./img/0402.jpg" style="float:right" alt="" onclick="location.href='./api/add_to_cart.php?id=<?=$row['id'];?>&qt=1'"></div>
<div>規格:<?=$row['spec']?></div>
<div>簡介:<?=mb_substr($row['intro'],0,25)?>...</div>
<?php
}
    ?>


<?php
if($type==0){

    $rows=$Good->all(['sh'=>1]);
    foreach($rows as $row){
?>

<a href="?do=good&id=<?=$row['id'];?>"><img src="./img/<?=$row['img'];?>" width="100px" alt=""></a>
<div class="tt"><?=$row['name'];?></div>
<div>價格:<?=$row['price']?><img src="./img/0402.jpg" style="float:right" alt="" onclick="location.href='./api/add_to_cart.php?id=<?=$row['id'];?>&qt=1'"></div>
<div>規格:<?=$row['spec']?></div>
<div>簡介:<?=mb_substr($row['intro'],0,25)?>...</div>
<?php
}}
    ?>

