<h2 class="ct">新增管理者帳號</h2>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <div class="ct">
        帳號:
        <input type="text" name="acc" id="">
    </div>
    <div class="ct">
        密碼:
        <input type="password" name="pw" id="">
    </div>
    <div class="ct">
        確認密碼:
        <input type="password"  id="">
    </div>
    <div class="ct">
        <div class="flext">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </div>
</form>