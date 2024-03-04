<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo $a . "+" . $b;
            echo   $_SESSION['ans'];
            ?>
            =<input type="text" id="ans">
            <input type="hidden" id="ans2" value="<?= $_SESSION['ans']; ?>">

        </td>
    </tr>
</table>
<div class="ct"><input type="button" value="確認" onclick="login()"></div>

<script>
    function login() {
        let acc = $('#acc').val();
        console.log(acc)
        let pw = $('#pw').val();
        console.log(pw)
        let ans = $('#ans').val();
        console.log(ans)
        let ans2 = $('#ans2').val();
        console.log(ans2);
        if (ans2 == ans) {

            $.post('./api/ck_admin.php', {
                    acc: acc,
                    pw: pw
                }, (res) => {  console.log(res)
                    if (res > 0) {
                      
                        location.href = "back.php";
                    } else {
                        alert('帳號或密碼錯誤');
                        console.log(res)
                    }
                }

            )
        } else {

            alert('對不起，您輸入的驗證碼有誤，請您重新登入');
        }
    }
</script>