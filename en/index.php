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

	var research_count = 0;
	var investing_count = 0;

	var auto_research_handler = -1;
	var auto_investing_handler = -1;

	var achievement_count = 0;
	var achievement_index = 0;
	var achievement_show_index = -1;
	var achievement_animating = false;

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

		var index = 0;
		var obj_name = "ga_label_" + index.toString();
		obj = document.getElementById(obj_name);

		while (obj != null)
		{
			achievement_count++;
			index++;
			obj_name = "ga_label_" + index.toString();
			obj = document.getElementById(obj_name);
		}

		index = 0;
		obj_name = "research_container_" + index.toString();
		obj = document.getElementById(obj_name);

		while (obj != null)
		{
			research_count++;
			index++;
			obj_name = "research_container_" + index.toString();
			obj = document.getElementById(obj_name);
		}

		index = 0;
		obj_name = "investing_container_" + index.toString();
		obj = document.getElementById(obj_name);

		while (obj != null)
		{
			investing_count++;
			index++;
			obj_name = "investing_container_" + index.toString();
			obj = document.getElementById(obj_name);
		}

		if (research_count > 1)
		{
			auto_research_handler = self.setInterval("AutoSwitchResearch()", 5000);
		}
		
		if (investing_count > 1)
		{
			auto_investing_handler = self.setInterval("AutoInvestingResearch()", 5000);
		}
	});

	function AutoSwitchResearch()
	{
		if (research_move_max_cnt != 0)
		{
			return;
		}

		var index = (current_research_index + 1) % research_count;

		var cur_circle_name = "#research_point_" + current_research_index;
		var target_circle_name = "#research_point_" + index;

		$(cur_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_unpressed.png'; ?>)");
		$(target_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_pressed.png'; ?>)");

		var cur_content_name = "#research_container_" + current_research_index;
		var target_content_name = "#research_container_" + index;

		var cur_end_pos = -1024;
		var target_start_pos = 1024;
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

	function AutoInvestingResearch()
	{
		if (investing_move_max_cnt != 0)
		{
			return;
		}

		var index = (current_investing_index + 1) % investing_count;

		var cur_circle_name = "#investing_point_" + current_investing_index;
		var target_circle_name = "#investing_point_" + index;

		$(cur_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_unpressed.png'; ?>)");
		$(target_circle_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/circle_orange_pressed.png'; ?>)");

		var cur_content_name = "#investing_container_" + current_investing_index;
		var target_content_name = "#investing_container_" + index;

		var cur_end_pos = -1024;
		var target_start_pos = 1024;
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

	function SwitchResearch(index, post_title)
	{
		if (index == current_research_index || research_move_max_cnt != 0)
		{
			return;
		}

		if (auto_research_handler != -1)
		{
			self.clearInterval(auto_research_handler);
			auto_research_handler = -1;
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

		if (auto_investing_handler != -1)
		{
			self.clearInterval(auto_investing_handler);
			auto_investing_handler = -1;
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

	function OnUpArrowClicked()
	{
		if (achievement_count <= 4 || achievement_index == -(achievement_count - 4) || achievement_animating)
		{
			return;
		}

		achievement_animating = true;

		var target_pos = (achievement_index - 1) * 72;
		$("#scroll-container").animate({top:target_pos.toString() + 'px'}, 'slow', function(){
			achievement_animating = false;
			achievement_index--;
		});
	}

	function OnDownArrowClicked()
	{
		if (achievement_count <= 4 || achievement_index == 0  || achievement_animating)
		{
			return;
		}

		achievement_animating = true;

		var target_pos = (achievement_index + 1) * 72;
		$("#scroll-container").animate({top:target_pos.toString() + 'px'}, 'slow', function(){
			achievement_animating = false;
			achievement_index++;
		});
	}

	function OnLabelClicked(idx)
	{
		if (idx < 0 || idx >= achievement_count)
		{
			return;
		}

		if (achievement_show_index > -1)
		{
			var obj_name = "#ga_label_" + achievement_show_index.toString();
			$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)");

			obj_name = "#ga_timeline_" + achievement_show_index.toString();
			$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)");

			obj_name = "#ga_line_" + achievement_show_index.toString();
			$(obj_name).css("background-color", "#acacac");

			obj_name = "#ga_round_point_" + achievement_show_index.toString();
			$(obj_name).css("background-color", "#acacac");

			obj_name = "#ga_year_" + achievement_show_index.toString();
			$(obj_name).css("color", "#333333");

			obj_name = "#ga_label_text_" + achievement_show_index.toString();
			$(obj_name).css("color", "#333333");

			obj_name = "#ga_content_" + achievement_show_index.toString();
			$(obj_name).hide();
		}

		var obj_name = "#ga_label_" + idx.toString();
		$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_orange.png'; ?>)");

		obj_name = "#ga_timeline_" + idx.toString();
		$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_orange.png'; ?>)");

		obj_name = "#ga_line_" + idx.toString();
		$(obj_name).css("background-color", "#f96700");

		obj_name = "#ga_round_point_" + idx.toString();
		$(obj_name).css("background-color", "#f96700");

		obj_name = "#ga_year_" + idx.toString();
		$(obj_name).css("color", "#f96700");

		obj_name = "#ga_label_text_" + idx.toString();
		$(obj_name).css("color", "#f96700");

		obj_name = "#ga_content_" + idx.toString();
		$(obj_name).show();

		achievement_show_index = idx;
	}

</script>

<div id="index">
	<div class="header">
		<div class="wrap">
			<div class="header-title">Data&nbsp;&nbsp;&middot;&nbsp;&nbsp;Technology&nbsp;&nbsp;&middot;&nbsp;&nbsp;Edge</div>
			<div class="header-text">We are building investing edge with <i>quantamental</i> data technology</div>
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
				<div class="s1-text">Since 2012, Goldpebble is one of the few earliest company to apply <i>quantamental</i> method in investment. With both infinite data and processing technology, Goldpebble has been able to develop continious edge in generating <i>quantamental</i> research, doing alternative investing and leading blockchain applications.</div>
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
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_selected . ")' onmouseover='SwitchResearch(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
				}
				else
				{
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_unselected . ")' onmouseover='SwitchResearch(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
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
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_selected . ")' onmouseover='SwitchInvesting(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
				}
				else
				{
					echo "<div id='" . $obj_name . "' class='circle' style='left: " . $pos . "px; background-image: url(" . $circle_unselected . ")' onmouseover='SwitchInvesting(" . $i . ", \"" . $research_array[$i]->post_title . "\");'></div>";
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
				<div class="s-title" style="color: #333333;">Blockchain Applications</div>
				<div class="s-line"></div>
				<div class="s-arrow" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/icon_learn_more.png'; ?>);"></div>
				<div class="s-lm" style="color: #333333;">Learn More</div>
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

				<div class="s4-right-2" onclick="SwitchPage('<?php echo home_url(); ?>/index.php/gpex');">
					<div class="s4r2-icon"></div>
					<div class="s4r2">GPEX</div>
				</div>

				<div class="s4-right-3" onclick="SwitchPage('<?php echo home_url(); ?>/../../livecoin/en');">
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
			<div class="s" style="top: 56px;">
				<div class="s-icon" style="top: 5px; left: 0px; width: 38px; height: 24px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/icon_eye.png'; ?>);"></div>
				<div class="s-title" style="color: #333333;">Goldpebble Achievement</div>
				<div class="s-line" style="background-color: rgb(244, 109, 0) !important;"></div>
			</div>

			<div class="s5-line"></div>

			<div class="s5-up-arrow" onclick="OnUpArrowClicked();"></div>
			<div class="s5-down-arrow" onclick="OnDownArrowClicked();"></div>

			<div class="s5-scrollrect">
				<div id="scroll-container" class="s5-scroll-container">
					<!-- 2012 -->
					<div class="achievement-frame" style="top: 0px;">
						<div id="ga_timeline_0" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_0" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_0" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_0" class="achievement-label-year" style="color: #333333">2012</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_0" class="achievement-desc-text" style="color: #333333;">Defeat short sellers on New Oriental (EDU US)</div>
						</div>
					</div>

					<!-- 2013 -->
					<div class="achievement-frame" style="top: 72px;">
						<div id="ga_timeline_1" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_1" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_1" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_1" class="achievement-label-year" style="color: #333333">2013</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_1" class="achievement-desc-text" style="color: #333333;">Earliest in understanding YY's business model</div>
						</div>
					</div>

					<!-- 2014 -->
					<div class="achievement-frame" style="top: 144px;">
						<div id="ga_timeline_2" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_2" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_2" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_2" class="achievement-label-year" style="color: #333333">2014</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_2" class="achievement-desc-text" style="color: #333333;">Opened China branch</div>
						</div>
					</div>

					<!-- 2018 -->
					<div class="achievement-frame" style="top: 216px;">
						<div id="ga_timeline_3" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_3" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_3" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_3" class="achievement-label-year" style="color: #333333">2018</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_3" class="achievement-desc-text" style="color: #333333;">Enrich the portfolio of cryptocurrencies</div>
						</div>
					</div>

					<!-- New Entry Template
					<div class="achievement-frame" style="top: 288px;">
						<div id="ga_label_4" class="achievement-label" style="background-image:url(<?php //echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)" onclick="OnLabelClicked(4);">
							<div class="achievement-label-cell">Blockchain Application</div>
						</div>

						<div id="ga_timeline_4" class="achievement-label-point" style="background-image:url(<?php //echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_4" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_4" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_4" class="achievement-label-year" style="color: #333333">2018</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_4" class="achievement-desc-text" style="color: #333333;">Enrich the portfolio of cryptocurrencies</div>
						</div>
					</div>
					-->
				</div>
			</div>

			<div id="ga_label_0" class="achievement-label" style="left: -140px; top: 170px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)" onclick="OnLabelClicked(0);">
				<div class="achievement-label-cell">Company Milestones</div>
			</div>

			<div id="ga_label_1" class="achievement-label" style="left: -140px; top: 245px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)" onclick="OnLabelClicked(1);">
				<div class="achievement-label-cell"><i>Quantamental</i> Research</div>
			</div>

			<div id="ga_label_2" class="achievement-label" style="left: -140px; top: 320px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)" onclick="OnLabelClicked(2);">
				<div class="achievement-label-cell">Alternative Investing</div>
			</div>

			<div id="ga_label_3" class="achievement-label" style="left: -140px; top: 395px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)" onclick="OnLabelClicked(3);">
				<div class="achievement-label-cell">Blockchain Application</div>
			</div>

			<div style="position: absolute; top: 105px; left: 20px; width: 4px; height: 386px; background-color: rgb(244, 109, 0);"></div>

			<div id="s5-content" class="s5-content-frame">
				<!-- 2012 -->
				<div id="ga_content_0" style="display: none;"></div>

				<!-- 2013 -->
				<div id="ga_content_1" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/logo_YY.jpg'; ?>); width: 288px; height: 103px; position: absolute; left: 72px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 30px; padding-right: 30px; position: absolute; top: 153px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 18px;">Goldpebble published a report about YY, which was not yet convered by any investment banks, The report helps institutional investors to better understand the live-streaming business. After the publishment, thestock price rose by 3 times, and trade volume rose by 5 times.</div>
				</div>

				<!-- 2014 -->
				<div id="ga_content_2" style="display: none;"></div>

				<!-- 2018 -->
				<div id="ga_content_3" style="display: none;"></div>

				<!-- New Entry Template
				<div id="ga_content_4" style="display: none;"></div>
				-->
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>