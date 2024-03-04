<h2 class="ct">新增管理帳號</h2>
<form action="./api/bottom.php" method="post">
<table class="ct all">
<tr>
    <td class="tt">頁尾宣告內容：</td>
    <td class="pp"><input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>"></td>
</tr>


</table>
<div class="ct">
    <input type="submit" value="新增">|
    <input type="reset" value="重置">
</div>
</form>