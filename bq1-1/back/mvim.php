
				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">動畫圖片輪播管理</p>
					<form method="post" action="./api/edit.php">
						<table width="100%" class="cent">
							<tbody>
								<tr class="yel">
									<td width="65%">動畫圖片</td>
									<!-- <td width="23%">替代文字</td> -->
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>
								<?php
								$rows=$Mvim->all();
								foreach($rows as $row){
								
								?>
								<tr>
									<td><img src="./img/<?=$row['img'];?>"  width="150px" height="150px"></td>
									<!-- <td><input type="text" name="text[]" value="<?=$row['text'];?>"></td> -->
									<td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1?'checked':'');?>></td>
									<td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
									<input type="hidden" name="id[]" value="<?=$row['id'];?>">
									<td><input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')" value="更新圖片"></td>
								</tr>
								<?php
								}?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<input type="hidden" name="table" value="<?=$do;?>">
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增動畫圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>
