<form action="./api/edit_news.php" method="post">
    <table>
        <tr class="ct">
            <td style="width:25%"><b>編號</b></td>
            <td style="width:25%"><b>標題</b></td>
            <td style="width:25%"><b>顯示</b></td>
            <td style="width:25%"><b>刪除</b></td>
        </tr>
        <?php
        $total = $New->count();
        $div = 3;
        $pages = ceil($total/$div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows=$New->all("limit $start,$div");
        foreach ($rows as $key => $row) {
            
            
            
        ?>
                  <tr class="ct">
                <td><?= $key + 1; ?></td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                </td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                </td>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </tr>

        <?php
        } ?>

    </table> <div  style="text-align:center">
    <div class="ct">
    <?php
    if($now-1>0){
        $prev=$now-1;
        echo "<a href='back.php?do=news&p=$prev'> ";
        echo " < ";
        echo " </a>";
    }
    for($i=1;$i<=$pages;$i++){
        $size=($i==$now)?'font-size:22px;':'font-size:16px;';
        echo "<a href='back.php?do=news&p=$i' style='{$size}'> ";
        echo $i;
        echo " </a>";
    }
    if($now+1<=$pages){
        $next=$now+1;
        echo "<a href='back.php?do=news&p=$next'> ";
        echo " > ";
        echo " </a>";
    }
    ?>
    
    </div>
    <div class="ct"><input type="submit" value="修改確定"></div>
</form>