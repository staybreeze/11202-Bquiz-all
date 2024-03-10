<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">最新消息資料管理</p>
					<form method="post" action="./api/edit.php">
						<table width="100%" clas="cent">
							<tbody>
								<tr class="yel cent" >
									<!-- <td width="45%">動畫圖片</td> -->
									<td width="80%">最新消息資料內容</td>
									<td width="10%">顯示</td>
									<td width="10%">刪除</td>
									<!-- <td></td> -->
								</tr>
                                <?php
											$total=$News->count();
											$div=3;
											$pages=ceil($total/$div);
											$now=$_GET['p']??1;
											$start=($now-1)*$div;
                                $rows=$News->all(" limit $start,$div");
                                foreach($rows as $row){
                                ?>
                                <tr class="cent">
									<!-- <td clas="cent" width="45%"><img src="./img/<?=$row['img'];?>" width="150"height="150"></td> -->
									<td width="23%">
								<textarea name="text" id="" cols="30" rows="10" style="width:100%"><?=$row['text'];?></textarea>		
								</td>
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
						<div class="cent">
						<?php
						if($now-1>0){
							$prev=$now-1;
							echo "<a href='?do=news&p=$prev'><</a>";
						}
						for($i=1;$i<=$pages;$i++){
							$fontsize=($now==$i)?'font-size:24px':'font-size:18px';
							echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a>";
						}
						
						if($now+1<$pages){
							$next=$now+1;
							echo "<a href='?do=news&p=$next'>></a>";
						}
						?>
						</div>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
                                    <input type="hidden" name="table" value="<?=$do;?>">
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增最新消息資料"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>