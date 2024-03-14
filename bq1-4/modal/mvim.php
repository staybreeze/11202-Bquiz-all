<h2 class="ct">新增動畫圖片</h2>
<hr>
<form action="./api/add.php" method="post">
    <div class="ct">動畫圖片: <input type="file" name="img" id=""></div>
    <!-- <div class="ct">標題區替代文字: <input type="text" name="text" id=""></div> -->

    <div class="ct">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">

        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>

</form>