<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$rows=$Ad->all(['sh'=>1]);
foreach($rows as $row){
    ?>
<?=$row['text'];?>
    <?php
}
?>				
</marquee>