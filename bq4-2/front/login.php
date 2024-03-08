<h2>第一次購物</h2>
<a href="?do=reg">
    <img src="./img/0413.jpg" alt="">
</a>
<h2>會員登入</h2>

<table class="all ct">
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
            dd($_SESSION['ans']);
            echo $a . "+" . $b;
            echo "<input type='hidden' name='session_ans' id='sessionAns' value='{$_SESSION['ans']}'>";
            ?>
            =<input type="text" name="ans" id="ans">

        </td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="確認" onclick="log()">
</div>

<script>
    function log() {
        let sAns = $("#sessionAns").val();
        console.log(sAns);
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let ans = $("#ans").val();

        if (ans == sAns) {
            $.post('./api/log.php', {
                acc: acc,
                pw: pw
            }, (res) => {
                console.log(res)
                if (res > 0) {
                    location.href = "index.php";
                } else {
                    alert('帳號或密碼錯誤')
                }

            })
        } else {
            alert('驗證碼錯誤')
        }
    }
</script>