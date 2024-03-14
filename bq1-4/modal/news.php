<h2 class="ct">新增最新消息資料</h2>
<hr>
<form action="./api/add.php" method="post">
    <!-- <div class="ct">標題區圖片: <input type="file" name="img" id=""></div> -->
    <div class="ct">最新消息資料:

<textarea name="text" id="" cols="30" rows="10"></textarea>

</div>

    <div class="ct">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">

        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>

</form>