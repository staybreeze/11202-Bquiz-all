<?php
$table = $_GET['table'];
switch ($table) {
    case "title":
        echo "<h2 class='ct'>更新網站標題區圖片</h2>";
        break;
    case "mvim":
        echo "<h2 class='ct'>更新動畫圖片</h2>";
        break;
    case "image":
        echo "<h2 class='ct'>更新校園映像資料圖片</h2>";
        break;
}

?>

<hr>

<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <div class="ct">

        <input type="file" name="img">
    <input type="hidden" name="id" value="<?= $_GET['id'];?>">
    <input type="hidden" name="table" value="<?= $_GET['table'];?>">
    </div>


    <div class="ct"><input type="submit" value="送出"></div>
</form>