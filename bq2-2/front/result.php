<fieldset>
    <?php
    $row=$Que->find($_GET['id']);
    ?>
    <legend>目前位置:首頁>問卷調查><sapn><?=$row['text'];?></sapn></legend>
<h3><b><?=$row['text'];?></b></h3>
<?php
$opts=$Que->all(['subject_id'=>$_GET['id']]);
foreach($opts as $opt){
    $total=($row['vote']!=0)?$row['vote']:1;
    $rate=round($opt['vote']/$total,2);

 ?>
<div style="display:flex;width:95%;text-align:center;">
    <div style="width:50%;"><?=$opt['text'];?></div>
    <div style="width:<?= 40 * $rate;?>%;height:20px;background-color:gainsboro;"></div>
    <div style="width:10%;"><?=$opt['vote'];?>票(<?=$rate * 100;?>%)</div>
</div>

 <?php





}?>
<div class="ct"><input type="submit" onclick="location.href='?do=que'" value="返回"></div></form>
</fieldset