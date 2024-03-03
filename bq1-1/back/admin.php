
				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">管理者帳號管理</p>
					<form method="post" action="./api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<!-- <td width="45%">網站標題</td> -->
									<td width="40%">帳號</td>
									<td width="40%">密碼</td>
									<!-- <td width="7%">顯示</td> -->
									<td width="7%">刪除</td>
									<!-- <td></td> -->
								</tr>
								<?php
								$rows=$Admin->all();
								foreach($rows as $row){
								
								?>
								<tr>
									<!-- <td><img src="./img/<?=$row['img'];?>"  width="300px" height="30px"></td> -->
									<td><input  style="width:80%"type="text" name="acc[]" value="<?=$row['acc'];?>"></td>
									<td><input  style="width:80%"type="text" name="pw[]" value="<?=$row['pw'];?>"></td>
									<!-- <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1?'checked':'');?>></td> -->
									<td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
									<input type="hidden" name="id[]" value="<?=$row['id'];?>">
									<!-- <td><input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')" value="更新圖片"></td> -->
								</tr>
								<?php
								}?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<input type="hidden" name="table" value="<?=$do;?>">
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增管理者"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>
