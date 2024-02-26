<fieldset>
    <legend>帳號管理</legend>

<form action="./api/del.php" method="post">
    <table style="width:95%;text-align:center">
        <tr>
            <td style="width:33%;background-color:gainsboro">帳號</td>
            <td style="width:33%;background-color:gainsboro">密碼</td>
            <td style="background-color:gainsboro">刪除</td>
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row){
        ?>
        <tr>
          <td><?=$row['acc'];?></td>
          <td><?=str_repeat("*",strlen($row['pw']));?></td>
          <td><input type="checkbox" name="del[]" id="" value="<?=$row['id'];?>"></td>
        </tr>
        <?php
        }?>

    </table>        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
</form>
    <h3>新增會員</h3>
    <p style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step1:登入帳號</td>
            <td style="width:50%"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="flex">
        <div>
            <input type="submit" value="新增" onclick="log()">
            <input type="reset" value="清除" onclick="reset()">
        </div>

    </div>

</fieldset>

<script>
    function log() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pw2 = $('#pw2').val();
        let email = $('#email').val();

        if (acc != "" && pw != "" && pw2 != "" && email != "") {
            $.post('./api/ck_acc.php', {
                acc: acc
            }, (res) => {

                if (res > 0) {
                    alert('帳號重複')
                } else {

                    if (pw != pw2) {
                        alert('密碼錯誤')
                    } else {
                        $.post('./api/reg.php', {acc:acc,pw:pw,email:email

                        },()=>{
                            alert('註冊成功，歡迎加入')
                            location.reload()
                        })
                    }
                }

            })

        } else {
            alert('不可空白')
        }}
</script>