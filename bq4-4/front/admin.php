
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
        <td class="pp"><?php
                        $a = rand(10, 99);
                        $b = rand(10, 99);
                        $_SESSION['ans'] = $a + $b;
                        dd($_SESSION['ans']);
                        echo $a . "+" . $b;
                        ?>
            =<input type="text" name="ans" id="ans"></td>
    </tr>
    <input type="hidden" id="sAns" value="<?= $_SESSION['ans']; ?>">
</table>
<div class="ct">
    <input type="button" value="確認" onclick="log()">
</div>
<script>
    function log() {
        let acc = $("#acc").val()
        let pw = $("#pw").val()
        let ans = $("#ans").val()
        let sAns = $("#sAns").val()
        console.log(acc)
        console.log(pw)
        console.log(sAns)
console.log(ans )
        if (ans == sAns) {
            $.post('./api/admin.php', {
                acc: acc,
                pw: pw
            }, (res) => {    console.log(res)
                if (res > 0) {
                
                    location.href = 'back.php'
                } else {
                    alert('帳號或密碼錯誤')
                }
            })
// alert('hi')
        } else {
            alert('對不起，您輸入的驗證碼有務請您重新登入')
        }
    }
</script>