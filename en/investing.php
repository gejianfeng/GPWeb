<?php
/*
Template Name: investing.php
 */
?>

<?php get_header(); ?>

<?php get_top_banner(); ?>

<div id="investing">
	<div class="header">
		<div class="wrap">
			<div class="header-title">Alternative Investing</div>
			<div class="header-content">With leading quantamental research capability, Goldpebble is<br/>dedicated to alternative assets with higher risk-adjusted returns.</div>
		</div>
	</div>

	<div class="s1">
		<div class="wrap">
			<div class="section-title">
				<div class="section-mark"></div>
				<div class="section-line"></div>
				<div class="section-title-text">Goldpebble Strength</div>
			</div>

			<div class="s1-text">Traditional asset classes have been densely covered, too crowded and matured for general investors to achieve high risk adjusted returns. Higher risk adjusted returns are usully accompanied with alternative assets integrating long value in market of limited liquidity which have been thoroughly researched. With the world leading quantamental research capability, Goldpebble is dedicated to investment in these alternative assets.</div>
		</div>
	</div>

	<div class="s2">
		<div class="wrap">
			<div class="section-title">
				<div class="section-mark"></div>
				<div class="section-line"></div>
				<div class="section-title-text">Cryptocurrencies</div>
			</div>

			<div class="s2-text">With the unique characteristics endowed by blockchain technology, Cryptocurrencies differentiates themselves from other assets: it is hard to carry out valuation as cryptocurrencies usually do not generate future cash flows, and the technical properties build a barrier for traditional investors to understand their fundamentals.<br/><br/>With quantamental research expertise, Goldpebble has been developing a proprietary valuation framework to pick out the most valuable ones from thousands of candidates.</div>

			<div class="s2-image"></div>
		</div>
	</div>

	<div class="s3">
		<div class="wrap">
			<div class="section-title">
				<div class="section-mark"></div>
				<div class="section-line"></div>
				<div class="section-title-text">Live Events</div>
			</div>

			<div class="s1-text">Goldpebble, through its sister company in China, managers the largest live event fund in China. With quantamental capacities, Goldpebble can precisely estimate the attendance and revenue of a live event, thus figuring out the profitable events among thousands of candidates. Goldpebble is the only company that provides funds to hundreds of live events eveny year.</div>

<script type="text/javascript">

	var count = 0;
	var move_max_cnt = 0;
	var obj_count = 0;
	var obj_pos_array;

	$(document).ready(function(){
		var obj = document.getElementById("cell0");

		while (obj != null) 
		{
			obj_count++;
			obj = document.getElementById("cell" + obj_count.toString());
		}

		if (obj_count > 0)
		{
			obj_pos_array = new Array(obj_count);
			for (var i = 0; i < obj_count; ++i)
			{
				obj_pos_array[i] = i;
			}
		}
	});

	function OnNextClicked()
	{
		if (move_max_cnt > 0 || obj_count <= 0)
		{
			return;
		}

		for(var i = 0; i < obj_count; ++i)
		{
			var obj_name = "#cell" + i.toString();

			var CurPosIdx = obj_pos_array[i];

			if (CurPosIdx > 3) {
				CurPosIdx = CurPosIdx - obj_count;
			}

			var NextPosIdx = CurPosIdx + 1;

			obj_pos_array[i] = NextPosIdx;

			var StartPos = (208 + 12) * CurPosIdx;
			var EndPos = (208 + 12) * NextPosIdx;

			move_max_cnt++;

			$(obj_name).css({"left":StartPos.toString() + "px"});

			if (CurPosIdx >= -1 && CurPosIdx <= 3)
			{
				$(obj_name).show();
			}
			else {
				$(obj_name).hide();
			}
				
			$(obj_name).animate({left:EndPos.toString() + 'px'}, 'slow', function(){
				if (NextPosIdx < 0 || NextPosIdx > 3)
				{
					$(obj_name).hide();
				}
				move_max_cnt--;
			});
		}
	}

	function OnPreviewClicked()
	{
		if (move_max_cnt > 0 || obj_count <= 0)
		{
			return;
		}

		for(var i = 0; i < obj_count; ++i)
		{
			var obj_name = "#cell" + i.toString();

			var CurPosIdx = obj_pos_array[i];

			if (CurPosIdx < 0) {
				CurPosIdx = CurPosIdx + obj_count;
			}

			var NextPosIdx = CurPosIdx - 1;

			obj_pos_array[i] = NextPosIdx;

			var StartPos = (208 + 12) * CurPosIdx;
			var EndPos = (208 + 12) * NextPosIdx;

			move_max_cnt++;

			$(obj_name).css({"left":StartPos.toString() + "px"});

			if (CurPosIdx >= 0 && CurPosIdx <= 4)
			{
				$(obj_name).show();
			}
			else {
				$(obj_name).hide();
			}
				
			$(obj_name).animate({left:EndPos.toString() + 'px'}, 'slow', function(){
				if (NextPosIdx < 0 || NextPosIdx > 3)
				{
					$(obj_name).hide();
				}
				move_max_cnt--;
			});
		}
	}

</script>

<?php
	$events_query = new WP_Query('category_name=LiveEvents');
	$count = 0;
	$img_array = array();

	if ($events_query->have_posts()):
		while($events_query->have_posts()):
			$events_query->the_post();
			$img_array[] = $post->post_content;
			$count++;
		endwhile;
	endif;

	wp_reset_query();

	if ($count == 0)
	{
		return;
	}

	if ($count > 4)
	{
		echo "<div class='arrow leftarrow' onclick='OnPreviewClicked();'></div>";
		echo "<div class='arrow rightarrow' onclick='OnNextClicked();'></div>";
	}

	if ($count == 1)
	{
		$img = $img_array[0];
		echo "<div class='live-event-image' style='top: 240px; left: 408px; background-image: url(" . $img . ");'>";
			echo $content;
		echo "</div>";
	}
	elseif ($count == 2)
	{
		$img1 = $img_array[0];
		echo "<div class='live-event-image' style='top: 240px; left: 298px; background-image: url(" . $img1 . ");'>";
			echo $content;
		echo "</div>";

		$img2 = $img_array[1];
		echo "<div class='live-event-image' style='top: 240px; left: 518px; background-image: url(" . $img2 . ");'>";
			echo $content;
		echo "</div>";
	}
	elseif ($count == 3)
	{
		$img1 = $img_array[0];
		echo "<div class='live-event-image' style='top: 240px; left: 188px; background-image: url(" . $img1 . ");'>";
			echo $content;
		echo "</div>";

		$img2 = $img_array[1];
		echo "<div class='live-event-image' style='top: 240px; left: 408px; background-image: url(" . $img2 . ");'>";
			echo $content;
		echo "</div>";

		$img3 = $img_array[2];
		echo "<div class='live-event-image' style='top: 240px; left: 632px; background-image: url(" . $img3 . ");'>";
			echo $content;
		echo "</div>";
	}
	elseif ($count >= 4)
	{
		echo "<div class='scrollrect'>";

		for ($i = 0; $i < $count; $i++)
		{
			$offset = (208 + 12) * $i;

			$img = $img_array[$i];

			echo "<div id='cell" . $i . "' class='live-event-image' style='left:" . $offset . "px; top:0px; background-image: url(" . $img . ");'>";
			echo "</div>";
		}

		echo "</div>";
	}
?>
		</div>
	</div>
</div>

<?php get_footer(); ?>