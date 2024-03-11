<?php


    $row = $Good->find($_GET['id']);

?>
<h2 class="ct"><?= $row['text']; ?></h2>
<img src="./img/<?= $row['img']; ?>" width="300px" alt="">

        <div class="pp">分類:<?= $Type->find(['id'=>$row['big']])['text']; ?>><?= $Type->find(['id'=>$row['mid']])['text']; ?></div>
        
        <div class="pp">編號:<?= $row['no']; ?></div>
        <div class="pp">價錢:<?= $row['price']; ?></div>

        <div class="pp">詳細說明:<?= $row['intro']; ?></div>
        <div class="pp">庫存量:<?= $row['stock']; ?></div>

        <div class="tt">
            <div class="ct">購買數量:
                <input type="hidden" id="id" value="<?=$_GET['id'];?>">
                <input type="text" name="qt" id="qt"><img src="./img/0402.jpg" onclick="buy()">
            </div>
        </div>

        <script>
            function buy(){
             let qt =$("#qt").val()
             let id =$("#id").val()
             console.log(qt)
             console.log(id)
             location.href=`./api/buycart.php?qt=${qt}&id=${id}`
            }
        </script>