<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">動態文字廣告管理</p>
					<form method="post"action="./api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<!-- <td width="45%">網站標題</td> -->
									<td width="63%">替代文字</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<!-- <td></td> -->
								</tr>
                                <?php
                                $rows=$Ad->all();
                                foreach($rows as $row){
                                ?>
                                <tr class="ct">
                                    <!-- <td><img src="./img/<?=$row['img'];?>" width="300px" height="30px" alt=""></td> -->
                                    <td ><input type="text" name="text[]" value=" <?=trim($row['text']);?>" style="width:100%">
                                        
                                   </td>
                                    <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>"  <?=($row['sh']==1?'checked':'');?> ></td>
                                    <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                                    <!-- <td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td> -->
									<input type="hidden" name="id[]" value="<?=$row['id'];?>">
								</tr>
                                <?php
                                }?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
                                   
                                    <input type="hidden" name="table" value="<?=$do;?>">
                                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增網站標題圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>