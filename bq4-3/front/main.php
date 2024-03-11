<?php
// dd($_SESSION);
$nav = '';
$type = $_GET['type']??0;
$row = $Type->find($type);
if ($type == 0) {
    $nav = "全部商品";
} elseif ($row['big_id'] == 0) {
    $nav = $row['text'];
} else {
    $big = $Type->find(['id' => $row['big_id']]);
    $nav = $big['text'] . ">" . $row['text'];
}
?>

<h2><?= $nav; ?></h2>


<?php
if ($type == 0) {
    $rows = $Good->all(['sh' => 1]);
    foreach ($rows as $row) {
?>

        <a href="?do=detail&id=<?=$row['id'];?>"><img src="./img/<?= $row['img']; ?>" width="300px" alt=""></a>
        <div class="tt"><?= $row['text']; ?></div>
        <div class="pp">價錢:<?= $row['price']; ?><a href="./api/buycart.php?id=<?=$row['id'];?>&qt=1"><img src="./img/0402.jpg" style="float:right" alt=""></a></div>
        <div class="pp">規格:<?= $row['spec']; ?></div>
        <div class="pp">簡介:<?= mb_substr($row['intro'], 0, 25); ?></div>
    <?php
    }
} elseif ($row['big_id'] == 0) {
    $rows = $Good->all(['sh' => 1,'big'=>$row['id']]);
    foreach ($rows as $row) {
    ?>

<a href="?do=detail&id=<?=$row['id'];?>"><img src="./img/<?= $row['img']; ?>" width="300px" alt=""></a>
        <div class="tt"><?= $row['text']; ?></div>
        <div class="pp">價錢:<?= $row['price']; ?><a href=""><img src="./img/0402.jpg" style="float:right" alt=""></a></div>
        <div class="pp">規格:<?= $row['spec']; ?></div>
        <div class="pp">簡介:<?= mb_substr($row['intro'], 0, 25); ?></div>
<?php
    }
}else{

    $rows = $Good->all(['sh' => 1,'mid'=>$row['id']]);
    foreach ($rows as $row) {
    ?>

<a href="?do=detail&id=<?=$row['id'];?>"><img src="./img/<?= $row['img']; ?>" width="300px" alt=""></a>
        <div class="tt"><?= $row['text']; ?></div>
        <div class="pp">價錢:<?= $row['price']; ?><a href=""><img src="./img/0402.jpg" style="float:right" alt=""></a></div>
        <div class="pp">規格:<?= $row['spec']; ?></div>
        <div class="pp">簡介:<?= mb_substr($row['intro'], 0, 25); ?></div>
<?php
    }
}
?>