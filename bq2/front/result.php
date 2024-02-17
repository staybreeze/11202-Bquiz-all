<fieldset>

    <legend>目前位置:首頁>問卷調查><?=$Que->find($_GET['id'])['text'];?></legend>


<h3><b><?=$Que->find($_GET['id'])['text'];?></b></h3>

<form action="./api/vote.php" method="post">
<?php
$que=$Que->find($_GET['id']);
$opts=$Que->all(['subject_id'=>$_GET['id']]);
foreach($opts as $opt){
$total=($que['vote']!=0)?$que['vote']:1;
$rate=round($opt['vote']/$total,2);
    echo "<div style='width:95%;display:flex;align-item:center;margin:10px 0'>";
    echo "<div style='width:50%'>{$opt['text']}</div>";
    echo "<div style='width:".(40*$rate)."%;height:20px;background-color:#ccc'></div>";
    echo "<div style='width:10%'>{$opt['vote']}票(".($rate*100)."%)</div>";
    echo "</div>";
    // echo "<div style='width:".(40*$rate)."%;height:20px;background-color:#ccc'></div>";

}
?>
<div class="ct">
    <a href="?do=que"><input type="button" value="返回"></a>
</div>
</fieldset>