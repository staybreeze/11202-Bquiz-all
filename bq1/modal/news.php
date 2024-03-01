<h2 class="ct">新增最新消息資料</h2>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <div class="ct">
        最新消息資料:
        <textarea type="text" name="text" id=""></textarea>
    </div>
    <div class="ct">
        <div class="flext">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </div>
</form>