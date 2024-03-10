<fieldset>

    <legend>目前位置:首頁>問卷調查><?= $Que->find($_GET['id'])['text']; ?></legend>
    <h2><?= $Que->find($_GET['id'])['text']; ?></h2>



    <?php
    $rows = $Que->all(['subject_id' => $_GET['id']]);
    $big = $Que->find($_GET['id']);

    foreach ($rows as $idx => $row) {
        $total = ($big['vote'] != 0) ? $big['vote'] : 1;
        $rate = round($row['vote'] / $total, 2);

        // dd($rate);
    ?>
    
    <div style="width:95%;display:flex">
            <div style="width:50%"><?= $idx + 1; ?>.<?= $row['text']; ?></div>
            <div style="width:<?= 40 * $rate; ?>%;background-color:gainsboro"></div>
            <div><?= $row['vote']; ?>票(<?=$rate*100;?>%)</div>
        </div>

    <?php
    }
    ?>



</fieldset>