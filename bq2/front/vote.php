<fieldset>

    <legend>目前位置:首頁>問卷調查><?=$Que->find($_GET['id'])['text'];?></legend>


<h3><b><?=$Que->find($_GET['id'])['text'];?></b></h3>

<form action="./api/vote.php" method="post">
<?php
$opts=$Que->all(['subject_id'=>$_GET['id']]);
foreach($opts as $opt){
?>
<div>
<input type="radio" name="opt" value="<?=$opt['id'];?>">
<?=$opt['text'];?>
</div>
<?php

}
?>
<div class="ct">
    <input type="submit" value="我要投票">
</div>
</form>
</fieldset>