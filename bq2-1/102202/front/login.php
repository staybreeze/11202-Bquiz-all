<fieldset>
    <legend>會員登入</legend>

    <table>
        <tr>
            <td style="background-color:gainsboro;width:50%">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="background-color:gainsboro;width:50%">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
    </table>

    <div style="display:flex">
        <input type="submit" value="登入" onclick="log()">
        <input type="reset" value="清空">
        <div style="margin-top:5px">
            <a href="?do=forget">忘記密碼</a>
            |
            <a href='?do=reg'>尚未註冊</a>
        </div>
    </div>

</fieldset>
<script>
    function log() {
     
  
        $.post('./api/ch_acc.php', {
            acc: $('#acc').val()
          
        }, (res) => {  
            if (parseInt(res) == 0) {
                alert('查無帳號')

            } else {
          
            
                $.post('./api/ch_pw.php', {
                    acc: $('#acc').val(),
                    pw: $('#pw').val()
                }, (res) => {
                    if (parseInt(res) == 1) {
                        if($('#acc').val() === 'admin') {
                            location.href = 'back.php'
                        } else {
                            location.href = 'index.php'
                        }
                    }else{
                        alert('密碼錯誤')
                    }
                })
            }

        })
    }
</script>