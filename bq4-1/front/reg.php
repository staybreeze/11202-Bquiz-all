<h2 class="ct">會員登註冊</h2>
<form action="./api/reg.php" method="post">
<table class="all">
<tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc">    <input type="button" value="檢查帳號" onclick="check()"></td>
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
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>


</table>
<div class="ct"><input type="submit" value="確認"></div>
</form>

<script>
function check(){
    $.post('./api/ck_acc.php',{acc:$('#acc').val()},(res)=>{
        if(res>0){
            alert('帳號重複')
        }else{
            alert('此帳號可以使用')
        }
    })
}

</script>