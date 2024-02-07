<fieldset>
    <legend>會員登入</legend>

        <table>
            <tr>
                <td style="width:50%;background-color:lightgray">帳號</td>
                <td style="width:50%"><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td style="width:50%;background-color:lightgray">密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
        </table>
        <input type="submit" value="登入" onclick="login()">
        <input type="reset" value="清除">
        <a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>

</fieldset>
<script>
    function login() {
        $.post( "./api/acc_ck.php ", {
            acc: $( "#acc ").val()
        }, (res) => {
            if (parseInt(res) == 0) {
                alert( "查無帳號 ");
            } else {
                $.post( "api/pw_ck.php ", {
                    acc: $( "#acc ").val(),
                    pw: $( "#pw ").val()
                }, (res) => {
                    if (parseInt(res) > 0) {
                        if ($("#acc").val() =='admin') {
                          location.href= "back.php ";
                        } else {
                            location.href= "index.php ";
                        }
                    } else {
                        alert( "密碼錯誤 ")
                    }
                })
            }
        })
    }
</script>