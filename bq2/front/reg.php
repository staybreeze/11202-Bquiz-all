<fieldset>
    <legend>會員登入</legend>
    <p style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table>
        <tr>
            <td style="width:50%;background-color:lightgray">Step1:登入帳號</td>
            <td style="width:50%"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:lightgray">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:lightgray">Step3:再次確認密碼</td>
            <td><input type="password" id="pw2"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:lightgray">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <input type="submit" value="註冊" onclick="reg()">
    <input type="reset" value="清除">

</fieldset>
<script>
    function reg() {
        let user = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            pw2: $('#pw2').val(),
            email: $('#email').val(),
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if (user.pw == user.pw2) {
                $.post('./api/acc_ck.php', {
                    acc: user.acc
                }, (res) => {
                    console.log(res)
                    if (parseInt(res) == 1) {
                        alert('帳號重複')
                    } else {
                        $.post('./api/reg.php', 
                            user, (res) => {
                            console.log(res)
                            alert('註冊成功，歡迎加入')
                        })
                    }
                })
            } else {
                alert('密碼錯誤');
            }
        } else {
            alert('不可空白');
        }
    }
</script>