<h2 class="ct">編輯頁尾版權頁</h2>
<form action="./api/bot.php" method="post">
<table class="all">
    <tr>
        <td class="tt">頁尾宣告內容</td>
        <td class="pp"><input type="text" name="bot" value="<?=$Bot->find(1)['bot'];?>"></td>
    </tr>
</table>
<div class="ct">
<input type="submit" value="編輯">|<input type="reset" value="重置">
</div></form>