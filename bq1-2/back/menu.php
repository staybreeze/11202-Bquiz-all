<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">選單管理</p>
					<form method="post" action="./api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="25%">主選單名稱</td>
									<td width="25%">選單連結網址</td>
									<td width="7%">次選單數</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>
                                <?php
                                $rows=$Menu->all(['menu_id'=>0]);
                                foreach($rows as $row){
                                ?>
                                <tr clas="cent">
									<!-- <td width="45%"><img src="./img/<?=$row['img'];?>" width="300px"height="30px"></td> -->
									<td width="23%"><input type="text" name="text[]" id="text" value="<?=$row['text'];?>"></td>
									<td width="23%"><input type="text" name="href[]" id="href" value="<?=$row['href'];?>"></td>
									<td><?=$Menu->count(['menu_id'=>$row['id']]);?></td>
									<td width="7%"><input type="checkbox" name="sh[]" id="sh"<?=($row['sh']==1)?'checked':'';?> value="<?=$row['id']?>"></td>
									<td width="7%"><input type="checkbox" name="del[]" id="del" value="<?=$row['id']?>"></td>
									<td>
                                        <input type="button"  onclick="op('#cover','#cvr','./modal/submenu.php?id=<?=$row['id'];?>')" value="編輯次選單">
                                    </td>
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
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增主選單"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>