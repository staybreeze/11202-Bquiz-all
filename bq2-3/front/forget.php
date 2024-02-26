<fieldset>
    <legend>忘記密碼</legend>
    <p>請輸入信箱以查詢密碼</p>
    <input type="text" name="email" id="email">
    <p style="color:red" id="res"></p>
 <input type="button" value="尋找" onclick="search()">
</fieldset>

<script>
    function search() {
        $.post('./api/search.php', {
            email: $('#email').val()
        }, (res) => {
            console.log(res)
            $('#res').text(res)
        })

    }
</script>