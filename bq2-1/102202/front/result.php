<fieldset>

    <?php
    $sub=$Que->find($_GET['id'])
    ?>
    <legend>目前位置:首頁>問卷調查><?=$sub['text'];?></legend>

    <h3><?=$sub['text'];?></h3>
    <?php
    $opts=$Que->all(['subject_id'=>$_GET['id']]);

    foreach($opts as $opt){
       $total=($sub['vote']!=0)?$sub['vote']:1;
       $rate=round($opt['vote']/$total,2);
  
echo "<div style='display:flex;width:95%'>";
echo "<div style='width:50%'>{$opt['text']}</div>";
echo "<div style='width:".(40*$rate)."%;background-color:gray'></div>";
echo "<div style='width:10%'>{$opt['vote']}票(".($rate*100)."%)</div>";
echo "</div>";

    }?>

    <div class="ct">
        <a href="?do=que"><input type="submit" value="返回"></a>
    </div>

</fieldset>