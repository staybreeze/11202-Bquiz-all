<fieldset>
    <legend>會員登入</legend>

    <div class="flex">
        <div style="background-color:gainsboro;width:10%;text-align:center;padding-top:5px">帳號</div>
        <div><input type="text" name="acc" id="acc"></div>
    </div>
    <br>
    <div class="flex">
        <div style="background-color:gainsboro;width:10%;text-align:center;padding-top:5px">密碼</div>
        <div><input type="password" name="pw" id="pw"></div>
    </div>
    <div class="flex">
        <div>
            <input type="button" value="登入" onclick="log()">
            <input type="button" value="清除" onclick="reset()">
        </div>
        <div><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
        </div>
    </div>
</fieldset>

<script>
    function log() {
        let acc = $("#acc").val()
        let pw = $("#pw").val()
        let email = $("#email").val()
        $.post('./api/ck_acc.php', {
            acc: acc
        }, (res) => {
            if (res > 0) {

                $.post('./api/ck_pw.php', {
                    acc: acc,
                    pw: pw
                }, (res) => {
                    if (res > 0) {

                        if ($('#acc').val() == 'admin') {
                            location.href='back.php'
                        } else {
                            location.href='index.php'
                        }

                    } else {
                        alert("密碼錯誤")
                    }
                })

            } else {
                alert("帳號錯誤")
            }
        })
    }
</script>