<div class="cent">
    <h2>新增校園映像圖片圖片</h2>
</div>
<hr>
<form action="./api/add.php" method="post">
<div class="cent">校園映像圖片: <input type="file" name="img" id="img"></div>
<!-- <div class="cent">標題區替代文字: <input type="text" name="text" id="text"></div> -->

<input type="hidden" name="table" value="<?=$_GET['table'];?>">
<div class="cent"><input type="submit" value="新增"><input type="reset" value="重置"></div></form>