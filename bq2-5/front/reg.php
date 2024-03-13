<fieldset>
    <legend>會員註冊</legend>
    <p style="color:red">*請輸入12字元</p>
    <div class="flex">
        <div style="background-color:gainsboro;width:30%;text-align:center;padding-top:5px">Step.1:帳號</div>
        <div><input type="text" name="acc" id="acc"></div>
    </div>
    <br>
    <div class="flex">
        <div style="background-color:gainsboro;width:30%;text-align:center;padding-top:5px">Step.2:密碼</div>
        <div><input type="password" name="pw" id="pw"></div>
    </div> <br>
    <div class="flex">
        <div style="background-color:gainsboro;width:30%;text-align:center;padding-top:5px">Step.3:確認密碼</div>
        <div><input type="password" id="pw2"></div>
    </div> <br>
    <div class="flex">
        <div style="background-color:gainsboro;width:30%;text-align:center;padding-top:5px">Step.4:信箱(尋找密碼時使用)</div>
        <div><input type="text" name="email" id="email"></div>
    </div> <br>
    <div class="flex">
        <div>
            <input type="button" value="註冊" onclick="reg()">
            <input type="button" value="清除" onclick="reset()">
        </div>
     
    </div>
</fieldset>

<script>
    function reg() {
        let acc = $("#acc").val()
        let pw = $("#pw").val()
        let pw2 = $("#pw2").val()
        let email = $("#email").val()

        if (acc != "", pw != "", pw2 != "", email != "") {

      $.post('./api/ck_acc.php', {
            acc: acc
        }, (res) => {
            if (res == 0) {
                if (pw == pw2) {
                    $.post('./api/reg.php', {
                        acc: acc,
                        pw: pw,
                        email: email
                    }, (res) => {
                        alert('註冊成功，歡迎加入')
                        location.href='index.php'
                    })
                } else {
                    alert("密碼錯誤")
                }

            } else {
                alert("帳號重複")
            }
        })
        } else {
            alert('不可空白')
        }

  
    }
</script>