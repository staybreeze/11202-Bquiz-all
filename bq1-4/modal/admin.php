<h2 class="ct">新增管理帳號</h2>
<hr>
<form action="./api/add.php" method="post">
    <!-- <div class="ct">標題區圖片: <input type="file" name="img" id=""></div> -->
    <div class="ct">帳號: <input type="text" name="acc" id="acc"></div>
    <div class="ct">密碼: <input type="password" name="pw" id="pw"></div>
    <div class="ct">確認密碼: <input type="password"  id="pw2"></div>

    <div class="ct">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">

        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>

</form>