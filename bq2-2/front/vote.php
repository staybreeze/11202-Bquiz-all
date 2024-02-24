<fieldset>
    <?php
    $row=$Que->find($_GET['id']);
    ?>
    <legend>目前位置:首頁>問卷調查><sapn><?=$row['text'];?></sapn></legend>
<h3><b><?=$row['text'];?></b></h3>
<?php
$opts=$Que->all(['subject_id'=>$_GET['id']]);
foreach($opts as $opt){

?>
<form action="./api/vote.php" method="post">

<input type="radio" name="opt" value="<?=$opt['id'];?>"><label for=""><?=$opt['text'];?></label><br>
<?php
}?>
<div class="ct"><input type="submit" value="我要投票"></div></form>
</fieldset