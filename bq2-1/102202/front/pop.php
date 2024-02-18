<fieldset>
    <legend>目前位置:首頁>人氣文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th style="width:30%"><b>標題</b></th>
            <th style="width:50%"><b>內容</b></th>
            <th"><b>人氣</b></th>
        </tr>
        <?php
        
        $total=$News->count(['sh'=>1]);
        $div=3;
        $pages=ceil($total/$div);
        $now=($_GET['p'])??1;
        $start=($now-1)*$div;
        $rows = $News->all(['sh'=>1],"order by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['title']; ?></td>
                <td><?= mb_substr($row['article'], 0, 25); ?>...
                    
                </td>
                <td>
                    <?= $row['good']; ?>個人說
                    <img src="./img/02B03.jpg" width="25px">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }

                    ?>
                </td>
            </tr>
        <?php
        } ?>
    </table>
    <div>
<?php
if(($now-1)>0){
    $prev=$now-1;
    echo "<a href='?do=pop&p=$prev'><</a>";
}

for($i=1;$i<=$pages;$i++){
$fontsize=($i==$now)?'24px':'18px';
    echo "<a href='?do=pop&p=$i' style='font-size:$fontsize'>$i</a>";
}

if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='?do=pop&p=$next'>></a>";
}
?>

    </div>
</fieldset>
<script>
function good(news){
	$.post("./api/good.php",{news},()=>{
		location.reload(true);
	})
}
</script>