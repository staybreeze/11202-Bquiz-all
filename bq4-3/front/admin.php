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
            ?>
            =<input type="text" name="ans" id="ans">
            <input type="hidden" id="sId" value="<?= $_SESSION['ans']; ?>">

        </td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="確認" onclick="log()">
</div>

<script>
    function log() {
        let acc = $("#acc").val()
        let pw = $("#pw").val()
        let ans = $("#ans").val()
        let sId = $("#sId").val()

        if (ans != sId) {
            alert('驗證碼錯誤')
        } else {
            $.post('./api/log_admin.php', {
                acc: acc,
                pw: pw
            }, (res) => {

                if (res > 0) {
                    location.href = 'back.php'
                } else {
                    alert('帳號或密碼錯誤')
                }
            })
        }
    }
</script>