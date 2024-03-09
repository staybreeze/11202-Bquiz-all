<div class="cent">
    <h2>
    <?php
    $table=$_GET['table'];
    switch($table){
        case"title":
            echo "更換標題區圖片";
            break;
            case"mvim":
                echo "更換動畫圖片";
                break;
                case"image":
                    echo "更換校園映像圖片";
                    break;
    }
    ?>    

    </h2>
</div>
<hr>
<form action="./api/update.php" method="post">
<div class="cent"><?php
    switch($table){
        case"title":
            echo "標題區圖片";
            break;
            case"mvim":
                echo "更換動畫圖片";
                break;
                case"image":
                    echo "更換校園映像圖片";
                    break;
    }
    ?>   
: <input type="file" name="img" id="img"></div>
<input type="hidden" name="id" value="<?=$_GET['id'];?>">
<input type="hidden" name="table" value="<?=$_GET['table'];?>">
<div class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></div></form>