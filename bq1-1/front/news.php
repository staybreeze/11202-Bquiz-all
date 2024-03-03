<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">


	<div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
		<span class="t botli">最新消息區

		</span>
		<?php
					$total = $News->count();
					$div = 3;
					$pages = ceil($total / $div);
					$now = ($_GET['p']) ?? 1;
					$start = ($now - 1) * $div;?>
		<ol class="ssaa" start="<?=$start+1;?>">
			<?php

			$rows = $News->all("limit $start,$div");
			foreach ($rows as $row) {

			?>

				<li><?= mb_substr($row['text'], 0, 25); ?>
					<div class="all" style="display:none"><?= $row['text']; ?>...</div>
				</li>
			<?php
			} ?>
		</ol>
		<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
		<script>
			$(".ssaa li").hover(
				function() {
					$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
					$("#altt").show()
				}
			)
			$(".ssaa li").mouseout(
				function() {
					$("#altt").hide()
				}
			)
		</script>
		<div class="cent">
			<?php
			if ($now - 1 > 0) {
				$prev = $now - 1;
				echo "<a href='?do=news&p=$prev'><</a>";
			}
			for ($i = 1; $i <= $pages; $i++) {
				$fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:18px';
				echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a>";
			}
			if ($now + 1 <= $pages) {
				$next = $now + 1;
				echo "<a href='?do=news&p=$next'>></a>";
			}
			?></div>

	</div>
</div>

<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>