<h2 class="cent">新增標題區圖片</h2>
<hr>
<form action="./api/add.php" method="post">
    <div class="cent">標題區圖片: <input type="file" name="img" id=""></div>
    <div class="cent">標題區替代文字: <input type="text" name="text" id=""></div>
    <div class="cent">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>