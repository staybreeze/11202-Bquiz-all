<fieldset>
    <legend>會員註冊</legend>
    <p style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table class="ct">
        <tr>
            <td style="width:50%;background-color:gainsboro">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">確認密碼</td>
            <td><input type="password" id="pw2"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">信箱</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>

    </table>
    <div class="flex">
        <div><input type="button" value="註冊" onclick="reg()">
            <input type="button" value="清除" onclick="reset()">
        </div>
</fieldset>

<script>
    function reg() {
        let acc = $('#acc').val()
        let pw = $('#pw').val()
        let pw2 = $('#pw2').val()
        let email = $('#email').val()
        console.log(pw)
                        console.log(pw2)
        if (acc != "", pw != '', pw2 = "", email != "") {
            $.post('./api/ck_acc.php', {
                acc: acc
            }, (res) => {
                if (res == 0) {
                    if ($('#pw').val()!=$('#pw2').val()) {
                        alert('密碼錯誤')                
                    } else {      
                        $.post('./api/reg.php', {
                            acc: acc,
                            pw: pw,
                            email: email
                        }, (res) => {

                            alert('註冊成功，歡迎加入')

                        })
                    }

                } else {
                    alert('帳號重複')
                }
            })
        } else {
            alert('不可空白')
        }

    }
</script>