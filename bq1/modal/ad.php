<h2 class="ct">新增動態文字廣告</h2>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <div class="ct">
        動態文字廣告:
        <input type="text" name="text" id="">
    </div>
    <div class="ct">
        <div class="flext">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </div>
</form>