<fieldset>
    <legend>會員登入</legend>
    <table class="ct">
        <tr>
            <td style="width:50%;background-color:gainsboro">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>

    </table>
    <div class="flex">
        <div><input type="button" value="登入"onclick="log()">
        <input type="button" value="清除"onclick="reset()">
    </div>              
    <div style="margin-left:100px">
<a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
    </div></div>
</fieldset>

<script>
    function log(){
        let acc=$('#acc').val()
        let pw=$('#pw').val()
        $.post('./api/ck_acc.php',{acc:acc},(res)=>{
            if(res>0){

                $.post('./api/ck_pw.php',{acc:acc,pw:pw},(res)=>{
                    if(res>0){

                        if($("#acc").val()=='admin'){
                            location.href='back.php'
                        }else{
                            location.href='index.php'
                        }
                    }else{
                        alert('密碼錯誤')
                    }
                })
            }else{
                alert('查無帳號')
            }
        })
    }
</script>