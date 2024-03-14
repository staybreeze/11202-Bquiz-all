<style>
    div{
        margin-top:1px
    }
</style>


<?php

$row=$Good->find($_GET['id']);

    ?>
    <h2 class="ct"><?=$row['text'];?> </h2>
    <img src="./img/<?=$row['img'];?>" width="200px"onclick="location.href='?do=detail&id=<?=$row['id'];?>&qt=1'">
    <!-- <div class="tt"><?=$row['text'];?></div> -->
    <div class="pp">分類:<?=$Type->find(['id'=>$row['big']])['text'];?>><?=$Type->find(['id'=>$row['mid']])['text'];?></div>
    <div class="pp">價錢:<?=$row['price'];?>
    
    </div>
    

    <div class="pp">詳細說明:<?=$row['intro']?></div>
        <div class="pp">庫存量:<?=$row['stock'];?></div>


        <div class="tt ct">購買數量 <input type="text" id="qt">
    <img src="./img/0402.jpg" onclick="buy()"></div>
<input type="hidden" name="id" id="id" value="<?=$_GET['id'];?>">
    <script>
        function buy(){
let qt=$("#qt").val()
let id=$("#id").val()
location.href=`./api/buycart.php?id=${id}&qt=${qt}`
        }
    </script>