<h2 class="cent">
    <?php
    $table=$_GET['table'];
    switch($table){
        case "title":
            echo "更換標題區圖片";
            break;
            case "mvim":
                echo "更換動畫區圖片";
                break;
                case "image":
                    echo "更換輪播區圖片";
                    break;
    }
    ?>
    
    
</h2>
<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <div class="cent">
    <?php
    switch($table){
        case "title":
            echo "更換標題區圖片";
            break;
            case "mvim":
                echo "更換動畫區圖片";
                break;
                case "image":
                    echo "更換輪播區圖片";
                    break;
    }
    ?>:
        <input type="file" name="img">
    </div>

    <div class="cent">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>