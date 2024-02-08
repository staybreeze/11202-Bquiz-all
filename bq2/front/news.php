<fieldset>
<legend>目前位置:首頁>最新文章區</legend>

<table>
    <tr>
        <td style="width:50%"><b>標題</b></td>
        <td style="width:30%"><b>內容</b></td>
        <td><b></b></td>
    </tr>
    <?php
    $total=$New->count(['sh'=>1]);
    $div=5;
    $pages=ceil($total/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    $rows=$New->all(['sh'=>1],"limit $start,$div");
    foreach($rows as $row){
    ?>
    <tr>
        <td class="title" data-id="<?=$row['id'];?>" style="cursor:pointer"><?=$row['title'];?></td>
        <td>
            <div id="s<?=$row['id'];?>">
        <?=mb_substr($row['news'],0,25);?>...
        </div>
            <div id="a<?=$row['id'];?>"style="display:none"><?=$row['news'];?></div>
        </td>
        <td></td>
    </tr>
    
    <?php
    }?>
</table>
<div>
    <?php
      if(($now-1) > 0){
        $prev=$now-1;
        echo "<a href='?do=news&p=$prev'><</a>";
            }
        
            for($i=1;$i<=$pages;$i++){
        $fontsize=($now==$i)?'fontsize:24px':'fontsize:6px';
        echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a> ";
            }
        
            if(($now+1)<=$pages){
        $next=$now+1;
        echo "<a href='?do=news&p=$next'>></a>";
        
            }
    ?>
</div>
</fieldset>
<script>
$('.title').click((e)=>{
    let id=$(e.target).data('id');
    $(`#s${id},#a${id}`).toggle();

})

</script>