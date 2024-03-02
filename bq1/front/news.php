<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
		<?= $Ad->find(['sh' => 1])['text']; ?>
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->


	
		<span class="t botli">最新消息區
			<?php
			if ($News->count(['sh' => 1]) > 5) {
				echo "<a href='?do=news' style='float:right;text-decoration:none'>More...</a>";
			}
			?>
		</span>
 	<?php
					$total = $News->count();
                    $div = 3;
                    $pages = ceil($total / $div);
                    $now = ($_GET['p']) ?? 1;
                    $start = ($now - 1) * $div;
                    $rows = $News->all("limit $start,$div");
                   
			?>
		<ol class="ssaa" style="list-style-type:decimal;" start='<?=$start+1;?>'>
		<?php
        foreach ($rows as $row) {
            ?>
				<li clss="ssww"><?= mb_substr($row['text'], 0, 20); ?>
					<div class="all" style="display:none"><?= $row['text']; ?></div>...
				</li>

			<?php
			}

			?>


		</ol>
        <div class="ct">
			<?php
			if ($now - 1 > 0) {
				$prev = $now - 1;
				echo "<a href='?do=news&p=$prev'><</a>";
			}
			for ($i = 1; $i <= $pages; $i++) {
				$fontsize = ($now == $i) ? 'font-size:24px' : 'font-size:18px';
				echo "<a href='?do=news&p=$i' style='$fontsize'>$i</a>";
			}

			if ($now + 1 < $pages) {
				$next = $now + 1;
				echo "<a href='?do=news&p=$next'>></a>";
			}
			?></div>
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
