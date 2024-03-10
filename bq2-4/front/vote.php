<fieldset>

    <legend>目前位置:首頁>問卷調查><?=$Que->find($_GET['id'])['text'];?></legend>
<h2><?=$Que->find($_GET['id'])['text'];?></h2>

<form action="./api/vote.php" method="post">
<?php
$rows=$Que->all(['subject_id'=>$_GET['id']]);
foreach($rows as $row){
    ?>
<input type="radio" name="mid" value="<?=$row['id'];?>">
<?=$row['text'];?><br>
<!-- <input type="hidden" name="id" value="<?=$row['id'];?>"> -->

<?php
}
?>

<input type="submit" value="我要投票">
</form>
</fieldset>