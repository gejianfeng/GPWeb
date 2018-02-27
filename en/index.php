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
			obj_name = "ga_year_" + index.toString();
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

		if (achievement_count > 0)
		{
			OnLabelClicked(achievement_count - 1);

			if (achievement_count > 4)
			{
				var target_pos = (achievement_count - 4) * 72 * -1;
				$("#scroll-container").css("top", target_pos.toString() + 'px');
				achievement_index = (achievement_count - 4) * -1;
			}
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
		$("#scroll-container").animate({top:target_pos.toString() + 'px'}, 'fast', function(){
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
		$("#scroll-container").animate({top:target_pos.toString() + 'px'}, 'fast', function(){
			achievement_animating = false;
			achievement_index++;
		});
	}

	function OnLabelClicked(idx)
	{
		if (idx < 0 || idx >= achievement_count || idx == achievement_show_index)
		{
			return;
		}

		if (achievement_show_index > -1)
		{
			ShowInfoPanel(achievement_show_index, false);
			SetAchievementStatus(achievement_show_index, false);
		}

		switch(idx)
		{
			case 0:
			{
				SetTabStatus(0, true)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 1:
			{
				SetTabStatus(0, true)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 2:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 3:
			{
				SetTabStatus(0, true)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 4:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 5:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 6:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 7:
			{
				SetTabStatus(0, true)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, true)
				break;
			}
			case 8:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, true)
				break;
			}
			case 9:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 10:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 11:
			{
				SetTabStatus(0, true)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 12:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 13:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 14:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 14:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, true)
				SetTabStatus(2, false)
				SetTabStatus(3, false)
				break;
			}
			case 15:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, false)
				SetTabStatus(2, true)
				SetTabStatus(3, false)
				break;
			}
			case 16:
			{
				SetTabStatus(0, true)
				SetTabStatus(1, false)
				SetTabStatus(2, true)
				SetTabStatus(3, false)
				break;
			}
			case 17:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, false)
				SetTabStatus(2, true)
				SetTabStatus(3, false)
				break;
			}
			case 18:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, true)
				break;
			}
			case 19:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, false)
				SetTabStatus(2, true)
				SetTabStatus(3, false)
				break;
			}
			case 20:
			{
				SetTabStatus(0, false)
				SetTabStatus(1, false)
				SetTabStatus(2, false)
				SetTabStatus(3, true)
				break;
			}
		}

		ShowInfoPanel(idx, true);
		SetAchievementStatus(idx, true);

		achievement_show_index = idx;
	}

	function SetTabStatus(idx, bEnabled)
	{
		var obj_name = "#ga_label_" + idx.toString();

		if (bEnabled)
		{
			$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_orange.png'; ?>)");
		}
		else
		{
			$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)");
		}
	}

	function ShowInfoPanel(idx, bShow)
	{
		var obj_name = "#ga_content_" + idx.toString();
		
		if (bShow)
		{
			$(obj_name).show();
		}
		else
		{
			$(obj_name).hide();
		}
	}

	function SetAchievementStatus(idx, bEnabled)
	{
		var obj_name;

		if (bEnabled)
		{
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
		}
		else
		{
			obj_name = "#ga_timeline_" + idx.toString();
			$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)");

			obj_name = "#ga_line_" + idx.toString();
			$(obj_name).css("background-color", "#acacac");

			obj_name = "#ga_round_point_" + idx.toString();
			$(obj_name).css("background-color", "#acacac");

			obj_name = "#ga_year_" + idx.toString();
			$(obj_name).css("color", "#333333");

			obj_name = "#ga_label_text_" + idx.toString();
			$(obj_name).css("color", "#333333");

			
		}
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

			<div class="s4-frame" style="right: 0px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/home_bj.jpg'; ?>);">

				<div class="s4-right-2" onclick="SwitchPage('<?php echo home_url(); ?>/index.php/gpex');">
					<div class="s4r2-icon"></div>
					<div class="s4r2">GPEX</div>
				</div>

				<div class="s4-right-3" onclick="SwitchPage('<?php echo home_url(); ?>/../../livecoin/en');">
					<div class="s4r3-icon"></div>
					<div class="s4r3">LiveCoins</div>
				</div>

				<div class="s4-right-1">
					<div class="s4r1">Applications</div>
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

			<div class="s5-up-arrow" onclick="OnDownArrowClicked();"></div>
			<div class="s5-down-arrow" onclick="OnUpArrowClicked();"></div>

			<div class="s5-scrollrect">
				<div id="scroll-container" class="s5-scroll-container">
					<!-- Entry 1 -->
					<div class="achievement-frame" style="top: 0px;" onclick="OnLabelClicked(0);">
						<div id="ga_timeline_0" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_0" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_0" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_0" class="achievement-label-year" style="color: #333333">2010.1</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_0" class="achievement-desc-text" style="color: #333333;">Goldpebble Singapore headquarter</div>
						</div>
					</div>

					<!-- Entry 2 -->
					<div class="achievement-frame" style="top: 72px;" onclick="OnLabelClicked(1);">
						<div id="ga_timeline_1" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_1" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_1" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_1" class="achievement-label-year" style="color: #333333">2012.5</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_1" class="achievement-desc-text" style="color: #333333;">Goldpebble Hong Kong office</div>
						</div>
					</div>

					<!-- Entry 3 -->
					<div class="achievement-frame" style="top: 144px;" onclick="OnLabelClicked(2);">
						<div id="ga_timeline_2" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_2" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_2" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_2" class="achievement-label-year" style="color: #333333">2012.9</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_2" class="achievement-desc-text" style="color: #333333;">Research Report on EDU US</div>
						</div>
					</div>

					<!-- Entry 4 -->
					<div class="achievement-frame" style="top: 216px;" onclick="OnLabelClicked(3);">
						<div id="ga_timeline_3" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_3" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_3" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_3" class="achievement-label-year" style="color: #333333">2012.11</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_3" class="achievement-desc-text" style="color: #333333;">Goldpebble Shanghai Rep Office</div>
						</div>
					</div>

					<!-- Entry 5 -->
					<div class="achievement-frame" style="top: 288px;" onclick="OnLabelClicked(4);">
						<div id="ga_timeline_4" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_4" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_4" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_4" class="achievement-label-year" style="color: #333333">2012.12</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_4" class="achievement-desc-text" style="color: #333333;">Social App Monitor on Sina Weibo</div>
						</div>
					</div>

					<!-- Entry 6 -->
					<div class="achievement-frame" style="top: 360px;" onclick="OnLabelClicked(5);">
						<div id="ga_timeline_5" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_5" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_5" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_5" class="achievement-label-year" style="color: #333333">2013.1</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_5" class="achievement-desc-text" style="color: #333333;"><i>Quantamental</i> research on YY's Business Model;</div>
						</div>
					</div>

					<!-- Entry 7 -->
					<div class="achievement-frame" style="top: 432px;" onclick="OnLabelClicked(6);">
						<div id="ga_timeline_6" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_6" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_6" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_6" class="achievement-label-year" style="color: #333333">2013.2</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_6" class="achievement-desc-text" style="color: #333333;">Earliest to understand value in Weibo</div>
						</div>
					</div>

					<!-- Entry 8 -->
					<div class="achievement-frame" style="top: 504px;" onclick="OnLabelClicked(7);">
						<div id="ga_timeline_7" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_7" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_7" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_7" class="achievement-label-year" style="color: #333333">2013.10</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_7" class="achievement-desc-text" style="color: #333333;">Cooperate with Fortress</div>
						</div>
					</div>

					<!-- Entry 9 -->
					<div class="achievement-frame" style="top: 576px;" onclick="OnLabelClicked(8);">
						<div id="ga_timeline_8" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_8" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_8" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_8" class="achievement-label-year" style="color: #333333">2014.1</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_8" class="achievement-desc-text" style="color: #333333;">Invested in ASIC Mining Chips Developer</div>
						</div>
					</div>

					<!-- Entry 10 -->
					<div class="achievement-frame" style="top: 648px;" onclick="OnLabelClicked(9);">
						<div id="ga_timeline_9" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_9" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_9" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_9" class="achievement-label-year" style="color: #333333">2014.5</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_9" class="achievement-desc-text" style="color: #333333;">Created Game Revenue Forecasting System</div>
						</div>
					</div>

					<!-- Entry 11 -->
					<div class="achievement-frame" style="top: 720px;" onclick="OnLabelClicked(10);">
						<div id="ga_timeline_10" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_10" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_10" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_10" class="achievement-label-year" style="color: #333333">2015.4</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_10" class="achievement-desc-text" style="color: #333333;">Baidu Search Data into GP Core System</div>
						</div>
					</div>

					<!-- Entry 12 -->
					<div class="achievement-frame" style="top: 792px;" onclick="OnLabelClicked(11);">
						<div id="ga_timeline_11" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_11" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_11" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_11" class="achievement-label-year" style="color: #333333">2015.9</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_11" class="achievement-desc-text" style="color: #333333;">Shanghai Subsidiary and Office</div>
						</div>
					</div>

					<!-- Entry 13 -->
					<div class="achievement-frame" style="top: 864px;" onclick="OnLabelClicked(12);">
						<div id="ga_timeline_12" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_12" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_12" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_12" class="achievement-label-year" style="color: #333333">2015.10</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_12" class="achievement-desc-text" style="color: #333333;">Taobao and JD Transaction Data into GP Core system</div>
						</div>
					</div>

					<!-- Entry 14 -->
					<div class="achievement-frame" style="top: 936px;" onclick="OnLabelClicked(13);">
						<div id="ga_timeline_13" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_13" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_13" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_13" class="achievement-label-year" style="color: #333333">2016.1</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_13" class="achievement-desc-text" style="color: #333333;">Chinese Credit Transaction Data into GP Core System</div>
						</div>
					</div>

					<!-- Entry 15 -->
					<div class="achievement-frame" style="top: 1008px;" onclick="OnLabelClicked(14);">
						<div id="ga_timeline_14" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_14" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_14" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_14" class="achievement-label-year" style="color: #333333">2016.8</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_14" class="achievement-desc-text" style="color: #333333;"><i>Quantamental</i> report on MOMO Live Business</div>
						</div>
					</div>

					<!-- Entry 16 -->
					<div class="achievement-frame" style="top: 1080px;" onclick="OnLabelClicked(15);">
						<div id="ga_timeline_15" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_15" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_15" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_15" class="achievement-label-year" style="color: #333333">2016.11</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_15" class="achievement-desc-text" style="color: #333333;">Asset Manager for Alternative Investing in China</div>
						</div>
					</div>

					<!-- Entry 17 -->
					<div class="achievement-frame" style="top: 1152px;" onclick="OnLabelClicked(16);">
						<div id="ga_timeline_16" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_16" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_16" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_16" class="achievement-label-year" style="color: #333333">2017.1</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_16" class="achievement-desc-text" style="color: #333333;">Licensed by AMAC on Alternative Investing</div>
						</div>
					</div>

					<!-- Entry 18 -->
					<div class="achievement-frame" style="top: 1224px;" onclick="OnLabelClicked(17);">
						<div id="ga_timeline_17" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_17" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_17" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_17" class="achievement-label-year" style="color: #333333">2017.3</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_17" class="achievement-desc-text" style="color: #333333;">Shanghai New Culture Fund Established</div>
						</div>
					</div>

					<!-- Entry 19 -->
					<div class="achievement-frame" style="top: 1296px;" onclick="OnLabelClicked(18);">
						<div id="ga_timeline_18" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_18" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_18" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_18" class="achievement-label-year" style="color: #333333">2017.9</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_18" class="achievement-desc-text" style="color: #333333;">World Earliest Bitcoin Fundamental Research Report</div>
						</div>
					</div>

					<!-- Entry 20 -->
					<div class="achievement-frame" style="top: 1368px;" onclick="OnLabelClicked(19);">
						<div id="ga_timeline_19" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_19" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_19" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_19" class="achievement-label-year" style="color: #333333">2017.12</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_19" class="achievement-desc-text" style="color: #333333;">Largest Live Events Fund in China &amp; GP Crypto-Assets Fund Established</div>
						</div>
					</div>

					<!-- Entry 21 -->
					<div class="achievement-frame" style="top: 1440px;" onclick="OnLabelClicked(20);">
						<div id="ga_timeline_20" class="achievement-label-point" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/droble_circle_gray.png'; ?>)"></div>
						<div id="ga_line_20" class="achievement-label-line" style="background-color: #acacac;"></div>
						<div id="ga_round_point_20" class="achievement-label-round-point" style="background-color: #acacac;"></div>

						<div id="ga_year_20" class="achievement-label-year" style="color: #333333">2018.1</div>

						<div class="achievement-desc-frame">
							<div id="ga_label_text_20" class="achievement-desc-text" style="color: #333333;">Live Coins Limited Established</div>
						</div>
					</div>
				</div>
			</div>

			<div id="ga_label_0" class="achievement-label" style="left: -140px; top: 170px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)">
				<div class="achievement-label-cell">Company Milestones</div>
			</div>

			<div id="ga_label_1" class="achievement-label" style="left: -140px; top: 245px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)">
				<div class="achievement-label-cell"><i>Quantamental</i> Research</div>
			</div>

			<div id="ga_label_2" class="achievement-label" style="left: -140px; top: 320px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)">
				<div class="achievement-label-cell">Alternative Investing</div>
			</div>

			<div id="ga_label_3" class="achievement-label" style="left: -140px; top: 395px; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/figure_gray.png'; ?>)">
				<div class="achievement-label-cell">Blockchain Application</div>
			</div>

			<div style="position: absolute; top: 105px; left: 20px; width: 4px; height: 386px; background-color: rgb(244, 109, 0);"></div>

			<div id="s5-content" class="s5-content-frame">
				<div id="ga_content_0" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic1.jpg'; ?>); width: 350px; height: 88px; position: absolute; left: 41px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 148px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble Research opened its headquarter in Singapore</div>
				</div>

				<div id="ga_content_1" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic1.jpg'; ?>); width: 350px; height: 88px; position: absolute; left: 41px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 148px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble Research opened its office in Hong Kong</div>
				</div>

				<div id="ga_content_2" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic2.jpg'; ?>); width: 216px; height: 83px; position: absolute; left: 108px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 143px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble published a <i>quantamental</i> research report on New Oriental Education &amp; Technology Group Inc. (EDU US). We helped correct the overreaction of investors due to the short-selling report published, and help market regain rationality.</div>
				</div>

				<div id="ga_content_3" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic1.jpg'; ?>); width: 350px; height: 88px; position: absolute; left: 41px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 148px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble opened its rep office in Shanghai</div>
				</div>

				<div id="ga_content_4" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-size: 80%; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic4.png'; ?>); width: 261px; height: 87px; position: absolute; left: 86px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 147px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble published the earliest social app monitor to check zombie accounts on Sina Weibo.</div>
				</div>

				<div id="ga_content_5" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/logo_YY.jpg'; ?>); width: 288px; height: 103px; position: absolute; left: 72px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 163px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble started its deep and continuous research on YY. We built up methodology to analyze business model.</div>
				</div>

				<div id="ga_content_6" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-size: 80%; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic4.png'; ?>); width: 261px; height: 87px; position: absolute; left: 86px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 147px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble was the earliest to understand the big monetization potential and company value in Weibo.</div>
				</div>

				<div id="ga_content_7" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic4.jpg'; ?>); width: 282px; height: 102px; position: absolute; left: 75px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 163px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble has been cooperating with Fortress Investment Group. Fortress was one of the earlist Bitcoin investors.</div>
				</div>

				<div id="ga_content_8" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic5.jpg'; ?>); width: 311px; height: 103px; position: absolute; left: 61px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 163px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble invested in one of the earliest developers of ASIC mining chips in China.</div>
				</div>

				<div id="ga_content_9" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic6.jpg'; ?>); width: 311px; height: 110px; position: absolute; left: 61px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 170px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble created the world first mobile game revenue forecasting system</div>
				</div>

				<div id="ga_content_10" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic7.jpg'; ?>); width: 367px; height: 292px; position: absolute; left: 33px; top: 33px;"></div>
				</div>

				<div id="ga_content_11" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic1.jpg'; ?>); width: 350px; height: 88px; position: absolute; left: 41px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 150px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble opened its subsidiary in Shanghai. Shanghai office was settled in Konwledge and Innovation Community (KIC) Shanghai.</div>
				</div>

				<div id="ga_content_12" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic8.jpg'; ?>); width: 357px; height: 89px; position: absolute; left: 38px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 150px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble integrated Taobao transaction data and JD transaction data into GP Core System.</div>
				</div>

				<div id="ga_content_13" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic9.jpg'; ?>); width: 281px; height: 110px; position: absolute; left: 76px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 170px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble integrated Chinese credit transaction data into GP Core System.</div>
				</div>

				<div id="ga_content_14" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-size: 80%; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic10.png'; ?>); width: 281px; height: 93px; position: absolute; left: 76px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 153px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble started its deep and continuous research on MOMO. We published a <i>quantamental</i> report on MOMO live business.</div>
				</div>

				<div id="ga_content_15" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic11.jpg'; ?>); width: 285px; height: 120px; position: absolute; left: 74px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 180px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble acquired an asset manager for alternative investing in China</div>
				</div>

				<div id="ga_content_16" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic12.jpg'; ?>); width: 264px; height: 103px; position: absolute; left: 85px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 163px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble China asset management company got licensed by Asset Management Association of China (AMAC) on alternative investing.</div>
				</div>

				<div id="ga_content_17" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic13.jpg'; ?>); width: 284px; height: 113px; position: absolute; left: 75px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 173px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble established its Shanghai New Culture Fund for its alternative investing business.</div>
				</div>

				<div id="ga_content_18" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic14.jpg'; ?>); width: 284px; height: 113px; position: absolute; left: 75px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 173px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble published one of the world earlist fundamental research report on Bitcoin. The research was done and published earlier than the major Wall Street firms.</div>
				</div>

				<div id="ga_content_19" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic15.jpg'; ?>); width: 284px; height: 113px; position: absolute; left: 75px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 173px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble has invested more than 100 live events with more than RMB 200mn. We have the largest live event fund in China. We also launched GP Crypto-Assets Fund.</div>
				</div>

				<div id="ga_content_20" style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/0/achievement_square_white.png'; ?>); width: 433px; height: 359px; position: absolute; left: 0px; top: 0px; display: none;">
					<div style="background-repeat: no-repeat; background-position: center; background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/image/8/pic16.jpg'; ?>); width: 284px; height: 114px; position: absolute; left: 75px; top: 35px;"></div>
					<div style="width: 100%; padding-left: 40px; padding-right: 40px; position: absolute; top: 175px; text-align: left; color: #333333; font-family: 'Georgia'; font-size: 16px;">Goldpebble established Live Coins Limited for blockchain application on crowdfunding for live events.</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>