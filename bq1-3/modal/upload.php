<h2 class="cent">

    <?php
    $table = $_GET['table'];
    switch ($table) {
        case "title":

            echo "更換標題區圖片";
            break;
            case "mvim":

                echo "更換動畫圖片";
                break;
        }

    ?>

</h2>
<hr>
<form action="./api/update.php" method="post">
    <div class="cent"><?php

            switch ($table) {
                case "title":

                    echo "標題區圖片";
                    break;
                    case "mvim":

                        echo "動畫圖片";
                        break;
            }

            ?>

        : <input type="file" name="img" id=""></div>
    <!-- <div>標題區替代文字: <input type="text" name="text" id=""></div> -->
    <div class="cent">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="submit" value="更換">
        <input type="reset" value="重置">
    </div>
</form>