<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>

    <table>
    <tr style="text-align:center">
            <td style="width:10%">編號</td>
            <td style="width:60%">問卷題目</td>
            <td style="width:10%">投票總數</td>
            <td style="width:10%">結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $rows=$Que->all(['subject_id'=>0]);
        
        foreach($rows as $idx =>$row){
        ?>
        <tr style="text-align:center">
            <td><?=$idx+1;?></td>
            <td><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td><a href="?do=result&id=<?=$row['id'];?>">結果</a></td>
            <td>
                <?php
                if(isset($_SESSION['user'])){

                    echo "<a href='?do=vote&id={$row['id']}'>參與投票</a>";
                }else{
                    echo "請先登入";
                }
                ?>
        </td>
        </tr>
        <?php
    }?>
    </table>
</fieldset>