<fieldset>
    <legend>帳號管理</legend>
<form action="./api/edit_admin.php" method="post">
    <table style="margin:auto;text-align:center;width:55%">
        <tr>
            <td class="clo">帳號</td>
            <td class="clo">密碼</td>
            <td class="clo">刪除</td>
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row){
        ?>
        <tr>
            <td><?=$row['acc'];?></td>
            <td><?=str_repeat("*",strlen($row['pw']));?></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
        </tr>
        <?php
        }?>

    </table>
<div class="ct">
    <input type="submit" value="確定刪除">
    <input type="reset" value="清空選取">
</div>
</form>


<h3>新增會員</h3>
    <p style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step1:登入帳號</td>
            <td><input type="text" id="acc"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step2:登入密碼</td>
            <td><input type="password" id="pw"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step3:再次確認密碼</td>
            <td><input type="password" id="pw2"></td>
        </tr>
        <tr>
            <td style="width:50%;background-color:gainsboro">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="email" name="" id="email"></td>
        </tr>
    </table>
    <div><input type="submit" value="註冊" onclick="reg()">
        <input type="reset" value="清除">
    </div>

<script>
    function reg() {
        if ($('#acc').val() && $('#pw').val() && $('#pw2').val() && $('#email').val()) {

            if ($('#pw').val() == $('#pw2').val()) {
                $.post('./api/ch_acc.php', {
                    acc: $('#acc').val()
                }, (res) => {

                    if (parseInt(res) == 0) {
                        $.post('./api/reg.php', {
                            acc: $('#acc').val(),
                            pw: $('#pw').val(),
                            email: $('#email').val()
                        }, (res) => {

                      console.log(res)
                        })
                    } else {
                        alert('帳號重複')
                    }

                })

            } else {
                alert('密碼錯誤')
            }
        } else {
            alert('不可空白')
        }




    }
</script>
</fieldset>