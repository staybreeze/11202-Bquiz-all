<fieldset>

    <legend>忘記密碼</legend>

    <p>請輸入信箱以查詢密碼</p>
    <input type="text" name="email" id="email">
    <p id="answer"></p>
    <input type="submit" value="尋找" onclick="search()">
</fieldset>
<script>
    function search() {

        $.post('api/search_pw.php', {
            email: $('#email').val()
        }, (res) =>{
            if (res >0) {
              $('#answer').text('您的密碼為:'+$('#email').val())
              
            }else{
                $('#answer').text('查無此資料')
            }

        })
    }
</script>