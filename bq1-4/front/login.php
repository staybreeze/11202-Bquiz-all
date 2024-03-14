
			<div class="di"
				style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php
include_once "marquee.php"
?>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->

					<p class="t botli">管理員登入區</p>
					<p class="cent">帳號 ： <input name="acc" id="acc" autofocus="" type="text"></p>
					<p class="cent">密碼 ： <input name="pw"  id="pw"type="password"></p>
					<!-- <p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p> -->
		
					<div class="ct">
						<input type="button" value="送出" onclick="log()">
						<input type="button" value="清除" onclick="reset()">
					</div>
			</div>
		
			<script>
function log(){
		let acc=$("#acc").val()
				let pw=$("#pw").val()
				$.post('./api/log.php',{acc:acc,pw:pw},(res)=>{
					if(res>0){
						location.href="back.php"
					}else{
						alert('帳號或密碼輸入錯誤')
						location.reload()
					}
				})

}
			

			</script>