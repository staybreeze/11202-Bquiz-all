<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">校園映像資料管理</p>
					<form method="post"action="./api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="65%">校園映像資料圖片</td>
							
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>
                                <?php
								$total=$Image->count();
								$div=3;
								$pages=ceil($total/$div);
								$now=($_GET['p'])??1;
								$start=($now-1)*$div;
                                $rows=$Image->all("limit $start,$div");
                                foreach($rows as $row){
                                ?>
                                <tr>
                                    <td class="ct"><img src="./img/<?=$row['img'];?>" width="150px" height="150px" alt=""></td>

                                    <td><input type="radio" name="sh" value="<?=$row['id'];?>"  <?=($row['sh']==1?'checked':'');?> ></td>
                                    <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                                    <td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td>
									<input type="hidden" name="id[]" value="<?=$row['id'];?>">
								</tr>
                                <?php
                                }?>
							</tbody>
						</table>
						<div class="ct">
						<?php
						if($now-1>0){
							$prev=$now-1;
							echo "<a href='?do=image&p=$prev'><</a>";
						}
						for($i=1;$i<=$pages;$i++){
							$fontsize=($now==$i)?'font-size:24px':'font-size:18px';
							echo "<a href='?do=image&p=$i' style='$fontsize'>$i</a>";
						}

						if($now+1<$pages){
							$next=$now+1;
							echo "<a href='?do=image&p=$next'>></a>";
						}
						?></div>
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