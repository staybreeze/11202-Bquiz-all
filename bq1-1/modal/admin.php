<h2 class="cent">新增標棟蓋文字廣告</h2>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <div class="cent">帳號:
        <input type="text" name="acc" id="">
    </div>
    <div class="cent">密碼:
        <input type="password" name="pw" id="">
    </div>
    <div class="cent">確認密碼:
        <input type="password"  id="">
    </div>
    <div class="cent">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>