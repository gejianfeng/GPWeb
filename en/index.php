<?php
/*
Template Name: index.php
*/
?>

<?php get_header(); ?>

<?php get_top_banner(); ?>

<script type="text/javascript">
	var current_research_index = 0;
	var current_investing_index = 0;
	var research_move_max_cnt = 0;
	var investing_move_max_cnt = 0;

	$(document).ready(function(){
		var obj = document.getElementById("research_container_0");

		if (obj != null) 
		{
			$("#research_container_0").show();
		}

		obj = document.getElementById("investing_container_0");

		if (obj != null) 
		{
			$("#investing_container_0").show();
		}
	});

	function SwitchResearch(index, post_title)
	{
		if (index == current_research_index || research_move_max_cnt != 0)
		{
			return;
		}

		var cur_circle_name = "#research_point_" + current_research_index;
		var target_circle_name = "#research_point_" + index;

		$(cur_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_unpressed.png'; ?>)");
		$(target_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_pressed.png'; ?>)");

		var cur_content_name = "#research_container_" + current_research_index;
		var target_content_name = "#research_container_" + index;

		var cur_end_pos = index > current_research_index ? -1024 : 1024;
		var target_start_pos = index > current_research_index ? 1024 : -1024;
		var target_end_pos = 0;

		research_move_max_cnt = 2;

		$(target_content_name).css({"left":target_start_pos.toString() + "px"});
		$(target_content_name).show();

		$(target_content_name).animate({left:target_end_pos.toString() + 'px'}, 'slow', function(){
			research_move_max_cnt--;
		});

		$(cur_content_name).animate({left:cur_end_pos.toString() + 'px'}, 'slow', function(){
			$(cur_content_name).hide();
			research_move_max_cnt--;
		});

		current_research_index = index;
	}

	function SwitchInvesting(index, post_title)
	{
		if (index == current_investing_index || investing_move_max_cnt != 0)
		{
			return;
		}

		var cur_circle_name = "#investing_point_" + current_investing_index;
		var target_circle_name = "#investing_point_" + index;

		$(cur_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_unpressed.png'; ?>)");
		$(target_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_orange_pressed.png'; ?>)");

		var cur_content_name = "#investing_container_" + current_investing_index;
		var target_content_name = "#investing_container_" + index;

		var cur_end_pos = index > current_investing_index ? -1024 : 1024;
		var target_start_pos = index > current_investing_index ? 1024 : -1024;
		var target_end_pos = 0;

		investing_move_max_cnt = 2;

		$(target_content_name).css({"left":target_start_pos.toString() + "px"});
		$(target_content_name).show();

		$(target_content_name).animate({left:target_end_pos.toString() + 'px'}, 'slow', function(){
			investing_move_max_cnt--;
		});

		$(cur_content_name).animate({left:cur_end_pos.toString() + 'px'}, 'slow', function(){
			$(cur_content_name).hide();
			investing_move_max_cnt--;
		});

		current_investing_index = index;
	}
</script>

<div id="index">
	<div class="header">
		<div class="wrap">
			<div class="header-title">Data&nbsp;&nbsp;&middot;&nbsp;&nbsp;Technology&nbsp;&nbsp;&middot;&nbsp;&nbsp;Edge</div>
			<div class="header-text">We are building investing edge with quantamental data technology</div>
		</div>
	</div>

	<div class="s1">
		<div class="wrap">
			<div class="s1-frame" style="left: 0px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/pic_big_data.png'; ?>);">
				<div class="s1-title">High Accessible <span style="color: #f96700;">Data</span></div>
				<div class="s1-text">With the advanced data storage and processing capabilities, large scale data and information can now be digitized and stored. Search engine technology and crowd-sourcing make data easily accessible. The challenge in this new era is how to process this deluge of data and information into knowledge and wisdom.</div>
			</div>

			<div class="s1-frame" style="left: 343px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/pic_technology.png'; ?>);">
				<div class="s1-title">Advanced Data <span style="color: #f96700;">Technology</span></div>
				<div class="s1-text">Goldpebble implements the leading technology in big data processing with expertise in investment applications.<br/><br/>Goldpebble built proprietary systems including GP HIDEN, GP CORE, GP OS and GP Psyc to identify relevant and actionable data for investment decision making.</div>
			</div>

			<div class="s1-frame" style="right: 0px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/pic_edge.png'; ?>);">
				<div class="s1-title">Unique Analysis <span style="color: #f96700;">Edge</span></div>
				<div class="s1-text">Since 2012, Goldpebble is one of the few earliest company to apply quantamental method in investment. With both infinite data and processing technology, Goldpebble has been able to develop continious edge in generating quantamental research, doing alternative investing and leading blockchain applications.</div>
			</div>
		</div>
	</div>

	<div class="s2">
		<div class="wrap">
			
			<div class="s2-container">

<?php

	$research_query = new WP_Query('category_name=HomeResearch');

	$research_array = array();

	if ($research_query->have_posts()):
		while($research_query->have_posts()):
			$research_query->the_post();
			$research_array[] = $post;
		endwhile;
	endif;

	wp_reset_query();

	$count = count($research_array);

	if ($count > 0)
	{
		if ($count > 5)
		{
			$count = 5;
		}

		// draw content

		for ($i = 0; $i < $count; ++$i)
		{
			$obj_name = "research_container_" . $i;
			echo "<div id='" . $obj_name . "' class='s2-frame' style='left: 0px;'>";
			echo $research_array[$i]->post_content;
			echo "</div>";
		}

		// draw circle
		
		$circle_unselected = get_stylesheet_directory_uri() . '/assets/image/0/circle_unpressed.png';
		$circle_selected = get_stylesheet_directory_uri() . '/assets/image/0/circle_pressed.png';

		if ($count > 1)
		{
			$len = $count * 14 + ($count - 1) * 16;
			$start_pos = (1024 - $len) / 2;

			for ($i = 0; $i < $count; ++$i)
			{
				$pos = $start_pos + (14 + 16) * $i;
				$obj_name = "research_point_" . $i;

				if ($i == 0)
				{
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_selected . ")' onclick='SwitchResearch(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
				}
				else
				{
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_unselected . ")' onclick='SwitchResearch(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
				}
			}
		}
	}

?>

			</div>

		</div>
	</div>

	<div class="s3">
		<div class="wrap">

			<div class="s3-container">

<?php

	$investing_query = new WP_Query('category_name=HomeInvesting');

	$investing_array = array();

	if ($investing_query->have_posts()):
		while($investing_query->have_posts()):
			$investing_query->the_post();
			$investing_array[] = $post;
		endwhile;
	endif;

	wp_reset_query();

	$count = count($investing_array);

	if ($count > 0)
	{
		if ($count > 5)
		{
			$count = 5;
		}

		// draw content

		for ($i = 0; $i < $count; ++$i)
		{
			$obj_name = "investing_container_" . $i;
			echo "<div id='" . $obj_name . "' class='s3-frame' style='left: 0px;'>";
			echo $investing_array[$i]->post_content;
			echo "</div>";
		}

		// draw circle
		
		$circle_unselected = get_stylesheet_directory_uri() . '/assets/image/0/circle_unpressed.png';
		$circle_selected = get_stylesheet_directory_uri() . '/assets/image/0/circle_orange_pressed.png';

		if ($count > 1)
		{
			$len = $count * 14 + ($count - 1) * 16;
			$start_pos = (1024 - $len) / 2;

			for ($i = 0; $i < $count; ++$i)
			{
				$pos = $start_pos + (14 + 16) * $i;
				$obj_name = "investing_point_" . $i;

				if ($i == 0)
				{
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_selected . ")' onclick='SwitchInvesting(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
				}
				else
				{
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_unselected . ")' onclick='SwitchInvesting(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
				}
			}
		}
	}
	
?>

			</div>

		</div>
	</div>

	<div class="s4">
		<div class="wrap">
			<div class="s" style="top: 48px;">
				<div class="s-icon" style="top: 0px; left: 0px; width: 37px; height: 35px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/icon_block_chain.png'; ?>);"></div>
				<div class="s-title">Blockchain Applications</div>
				<div class="s-line"></div>
				<div class="s-arrow" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/icon_learn_more.png'; ?>);"></div>
				<div class="s-lm">Learn More</div>
			</div>

			<div class="s4-frame" style="left: 0px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/Block_chain_rectangle.jpg'; ?>);">
					
				<div class="s4-icon1"></div>
				<div class="s4-title">Decentralization</div>
				<div class="s4-text">Security with Distributed System</div>
			</div>

			<div class="s4-frame" style="left: 260px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/Block_chain_rectangle.jpg'; ?>);">
					
				<div class="s4-icon2"></div>
				<div class="s4-title">Openness</div>
				<div class="s4-text">Trust with Transparency</div>
			</div>

			<div class="s4-frame" style="left: 520px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/Block_chain_rectangle.jpg'; ?>);">

				<div class="s4-icon3"></div>
				<div class="s4-title">Ecosystem</div>
				<div class="s4-text">Groth with Collective<br/>Self Interests</div>
			</div>

			<div class="s4-frame" style="right: 0px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/Block_chain_rectangle1.jpg'; ?>);">

				<div class="s4-right-1">
					<div class="s4r1">Applications</div>
				</div>

				<div class="s4-right-2">
					<div class="s4r2-icon"></div>
					<div class="s4r2">GPEX</div>
				</div>

				<div class="s4-right-3">
					<div class="s4r3-icon"></div>
					<div class="s4r3">LiveCoins</div>
				</div>

			</div>

			<div class="s4-mark" style="left: 225px;"></div>
			<div class="s4-mark" style="left: 485px;"></div>
		</div>
	</div>

	<div class="s5">
		<div class="wrap">
			
		</div>
	</div>
</div>

<?php get_footer(); ?>