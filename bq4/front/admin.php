<h3>第一次購買</h3>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">

<h3>會員登入</h3>

<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo "{$a}+{$b}=";
            dd($_SESSION);
            ?><input type="text" name="id" id="ans">
        </td>
    </tr>
</table>

<div class="ct">
    <button onclick="login('admin')">確認</button>
</div>

<script>
    function login(table) {
        $.post('./api/chk_ans.php', {
            ans: $('#ans').val()
        }, (res) => {
            if (res == 1) {
                $.post('./api/chk_pw.php', {
                    table,
                    acc: $('#acc').val(),
                    pw: $('#pw').val()
                }, (res) => {
                    console.log(res)
                    if (res > 0) {

                        location.href = "back.php";
                    } else {
                        alert('帳號或密碼錯誤')
                    }
                })

            } else {
                console.log(res)
                alert('驗證碼錯誤')
            }

        })
    }
</script>