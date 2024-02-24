<p>請輸入信箱以查詢密碼</p>
<input type="text" name="email" id="email">
<div class="res"></div>
<input type="button" value="尋找" onclick="search()">

<script>
    function search(){
        $.post('./api/search.php',{email:$('#email').val()},(res)=>{
            $('.res').text(res);
        })
    }
</script>