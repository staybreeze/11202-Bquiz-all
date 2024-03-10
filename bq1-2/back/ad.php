<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">動態文字廣告管理</p>
					<form method="post" action="./api/edit.php">
						<table width="100%" clas="cent">
							<tbody>
								<tr class="yel cent" >
									<!-- <td width="45%">動畫圖片</td> -->
									<td width="80%">動態文字廣告</td>
									<td width="10%">顯示</td>
									<td width="10%">刪除</td>
									<!-- <td></td> -->
								</tr>
                                <?php
                                $rows=$Ad->all();
                                foreach($rows as $row){
                                ?>
                                <tr class="cent">
									<!-- <td clas="cent" width="45%"><img src="./img/<?=$row['img'];?>" width="150"height="150"></td> -->
									<td width="23%"><input style="width:90%" type="text" name="text[]" id="text" value="<?=$row['text'];?>"></td>
									<td  clas="cent" width="7%"><input type="checkbox" name="sh[]" id="sh"<?=($row['sh']==1)?'checked':'';?> value="<?=$row['id']?>"></td>
									<td clas="cent" width="7%"><input type="checkbox" name="del[]" id="del" value="<?=$row['id']?>"></td>
									<!-- <td> -->
                                        <!-- <input type="button" value="更新動畫" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')" value="更新照片">
                                    </td> -->
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
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增動態文字廣告"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>