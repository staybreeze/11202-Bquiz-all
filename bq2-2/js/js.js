// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(id){
	$.post('./api/good.php',{id:id},()=>{
		location.reload();
	})
}
function reset(){
	location.reload();
}