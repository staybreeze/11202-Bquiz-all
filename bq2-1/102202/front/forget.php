
<h3>請輸入信箱以查詢密碼</h3>
<input type="text" id="email">
<div id="ans"></div>
<input type="button" value="尋找" onclick="search()">

<script>

function search(){
$.post('./api/search.php',{email:$('#email').val()},(res)=>{

    $('#ans').html(res)
})

}

</script>