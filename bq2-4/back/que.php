<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/menu.php" method="post">
        <table>
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="subject" id=""></td>
            </tr>
            <tr id="box">
                <td>選項</td>
                <td><input type="text" name="mid[]" id=""></td>
                <td><input type="button" value="更多" onclick="more()"></td>
            </tr>
        </table>
        <input type="submit" value="新增">|<input type="reset" value="清空">
    </form>
</fieldset>

<script>
    function more() {
        let box = `        </tr>
        <tr>
            <td>選項</td>
            <td><input type="text" name="mid[]" id=""></td>
        
        </tr>`

$("#box").before(box)
    }
</script>