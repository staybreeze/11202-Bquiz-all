<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>

        <table>
            <tr>
                <th style="width:10%"><b>編號</b></th>
                <th style="width:60%;text-align:center"><b問卷題目</b></th>
                <th style="width:10%"><b>投票總數</b></th>
                <th style="width:10%"><b>結果</b></th>
                <th style="width:10%"><b>狀態</b></th>
            </tr>
            <?php
  
            $rows = $Que->all(['subject_id'=>0]);
            foreach ($rows as $idx => $row) {
            ?>
                <tr class="ct">
                    <td><?= $idx + 1 ?></td>
                    <td class="news">
                        <div><?= $row['text']; ?>
                        </div>

                    </td>
                    <td>
                    <?= $row['vote']; ?>
                    </td>
                    <td>
<a href="?do=result&id=<?=$row['id'];?>">結果</a>
                    </td>
                    <td>
                        <?php
                        if(isset($_SESSION['user'])){
                            echo "<a href='?do=vote&id={$row['id']}'>參與投票</a>";
                        }else{
                            echo "請先登入";
                        }?>
                      </td>
                </tr>
            <?php
            } ?>
        </table>

    
</fieldset>