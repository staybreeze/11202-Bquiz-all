<h2 class="ct">新增主選單</h2>
<hr>
<form action="./api/add.php" method="post">
    <!-- <div class="ct">標題區圖片: <input type="file" name="img" id=""></div> -->
    <div class="ct">主選單名稱: <input type="text" name="text" id=""></div>
    <div class="ct">主選單連結網址: <input type="text" name="href" id=""></div>
    <div class="ct">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">

        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>

</form>