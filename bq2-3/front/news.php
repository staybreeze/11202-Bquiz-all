<fieldset>
    <legend>目前位置:首頁>最新文章區</legend>
    <table style="width:95%">
        <tr>
            <td style="width:25%"><b>標題</b></td>
            <td style="width:50%"><b>內容</b></td>
            <td></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);

        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td style="width:25%;background-color:gainsboro" class="tag" data-id="<?=$row['id'];?>"><?= $row['title']; ?></td>
                <td>
                   <div id="s<?=$row['id'];?>"  class="s">
                <?= (mb_substr($row['news'], 0, 25)); ?>...</div> 
            <div id="a<?=$row['id'];?>" style="display: none;"class="a"><?= $row['news']?></div>
            </td>
                <td>
                <?php
                if(isset($_SESSION['user'])){
                    if($Log->count(['acc'=>$_SESSION['user'],'news'=>$row['id']])>0){

                         echo "<a href='Javascript:good({$row['id']})'>收回讚</a>"; 
                    }else{
                        echo "<a href='Javascript:good({$row['id']})'>讚</a>"; 
                    }
                  
                }?>
                </td>
            </tr>
        <?php


        } ?>
    </table>
    <?php

    if (($now - 1) > 0) {
        $prev = $now - 1;
        echo "<a href='?do=news&p=$prev'><</a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:18px';
        echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a>";
    }

    if (($now + 1) <= $pages) {
        $next = $now + 1;
        echo "<a href='?do=news&p=$next'>></a>";
    } ?>
</fieldset>

<script>
$('.tag').click(function(){
    $('.s').show();
    $('.a').hide();
    let id= $(this).data('id')
    $('#s'+id).hide()
    $('#a'+id).show()
})

</script>