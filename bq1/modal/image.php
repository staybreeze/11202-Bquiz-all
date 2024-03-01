<h2 class="ct">新增校園映像圖片</h2>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div class="ct">校園映像圖片:
        <input type="file" name="img" id="">
    </div>

    <div class="ct">
        <div class="flext">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </div>
</form>