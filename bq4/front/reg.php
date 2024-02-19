<h3>會員註冊</h3>

<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc">
            <button onclick="chkacc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt">住址</td>
        <td class="pp"><input type="text" name="adrr" id="adrr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>

<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button>
</div>


<script>
    function chkacc() {
        let acc = $('#acc').val()
        $.get('./api/chk_acc.php', {
            acc
        }, (res) => {
            console.log(res)
            if (parseInt(res) == 1 || acc == 'admin') {
                alert(`此帳號${acc}已被使用`)
            } else {
                alert(`此帳號${acc}可以使用`)
            }
        })
    }

    function reg(){
        let user={
            name:$('#name').val(),
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            tel:$('#tel').val(),
            addr:$('#addr').val(),
            email:$('#email').val(),
        }
        $.post('./api/reg.php',user,(res)=>{
            console.log(res)
            alert("註冊成功，歡迎加入")
            location.href="?do=login"
        })
    }
</script>