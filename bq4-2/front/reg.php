<h2 class="ct">會員註冊</h2>
<form action="./api/reg.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc">
                <input type="button" value="檢查帳號" onclick="check()">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email"></td>
        </tr>

    </table>
    <div class="ct">
        <input type="submit" value="註冊">|<input type="reset" value="重置">
    </div>
</form>
<script>
    function check() {
        if ($("#acc").val() == 'admin') {
            alert('該帳號不可使用')
        }
        $.post('./api/check.php', {
            acc: $("#acc").val()
        }, (res) => {
            if (res > 0) {
                alert('該帳號已註冊')
            } else {
                alert('該帳號可以使用')
            }


        })
    }
</script>