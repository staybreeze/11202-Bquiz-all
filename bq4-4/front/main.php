<?php
$type=($_GET['type'])??0;

$nav="";
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
if($type==0){

    $rows=$Good->all();
    foreach($rows as $row){
?>
<img src="./img/<?=$row['img'];?>" width="200px"onclick="location.href='?do=detail&id=<?=$row['id'];?>&qt=1'">
<div class="tt"><?=$row['text'];?></div>
<div class="pp"><?=$row['price'];?>
<img src="./img/0402.jpg" onclick="location.href='./api/buycart.php?id=<?=$row['id'];?>&qt=1'" style="float:right">
</div>

<div class="pp"><?=$row['spec'];?></div>
<div class="pp"><?=mb_substr($row['intro'],0,25);?></div>
<?php
}}elseif($row['big_id']==0){
    $rows=$Good->all(['big'=>$row['id']]);
    foreach($rows as $row){
    ?>
    <img src="./img/<?=$row['img'];?>" width="200px"onclick="location.href='?do=detail&id=<?=$row['id'];?>&qt=1'">
    <div class="tt"><?=$row['text'];?></div>
    <div class="pp"><?=$row['price'];?>
    <img src="./img/0402.jpg" onclick="location.href='./api/buycart.php?id=<?=$row['id'];?>&qt=1'" style="float:right">
    </div>
    
    <div class="pp"><?=$row['spec'];?></div>
    <div class="pp"><?=mb_substr($row['intro'],0,25);?></div>
    <?php
}}else{
    $rows=$Good->all(['mid'=>$row['id']]);
    foreach($rows as $row){
    ?>
    <img src="./img/<?=$row['img'];?>" width="200px"onclick="location.href='?do=detail&id=<?=$row['id'];?>&qt=1'">
    <div class="tt"><?=$row['text'];?></div>
    <div class="pp"><?=$row['price'];?>
    <img src="./img/0402.jpg" onclick="location.href='./api/buycart.php?id=<?=$row['id'];?>&qt=1'" style="float:right">
    </div>
    
    <div class="pp"><?=$row['spec'];?></div>
    <div class="pp"><?=mb_substr($row['intro'],0,25);?></div>
    <?php
    }
}
?>

