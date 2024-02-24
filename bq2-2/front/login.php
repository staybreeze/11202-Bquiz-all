<fieldset>
    <legend>會員登入</legend>

    <table>
        <tr>
            <td style="width:50%;background-color:gainsboro">帳號</td>
            <td style="width:50%"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
    </table>
    <div style="display:flex">
        <div>
            <input type="submit" value="登入" onclick=log()>
            <input type="reset" value="清除">
        </div>

        <div>
            <a href="?do=forget">忘記密碼</a>|
            <a href="?do=reg">尚未註冊</a>
        </div>
    </div>

</fieldset>

<script>
    function log() {

        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('./api/ck_acc.php', {
            acc: acc
        }, (res) => {

            if (res == 0) {

                alert('查無帳號')

            } else {
                $.post('./api/ck_pw.php', {acc:acc,
                    pw: pw
                }, (res) => {

                    if (res > 0) {
                        if (acc == 'admin') {
                            location.href = "back.php";
                        } else {
                            location.href = "index.php";
                        }
                    }else{
                
                    alert('密碼錯密');
          
                    }
                }
                )

            }
        })

    }
</script>