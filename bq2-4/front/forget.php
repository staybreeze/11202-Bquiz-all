<fieldset>
    <legend>忘記密碼</legend>
    請輸入信箱以查詢密碼
    <input type="text" name="email" id="email">
    <p id="ans"></p>
    <input type="button" value="尋找" onclick="search()">
</fieldset>
<script>

    function search(){
        let email=$('#email').val()
        $.post('./api/search.php',{
email:email
        },(res)=>{
            $("#ans").text(res)
        })
    }
</script>