<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾反權資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
<tr>
    <td class="yel">頁尾版權資料:</td>
    <td><input type="text" name="bottom[]" value="<?=$Bottom->find(1)['bottom'];?>"></td>
    <input type="hidden" name="id[]" value="1">
</tr>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <!-- <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動態文字廣告"></td> -->
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>