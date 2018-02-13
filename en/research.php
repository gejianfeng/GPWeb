<?php
/*
Template Name: research.php
 */
?>

<?php get_header(); ?>

<?php get_top_banner(); ?>

<script type="text/javascript">

	function SwitchChart(index)
	{
		for(var i = 1; i <= 4; ++i)
		{
			var obj_name = '#btn' + i;
			
			if (i == index)
			{
				$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/1/figure_orange.png'; ?>)");
			}
			else
			{
				$(obj_name).css("background-image", "url(<?php echo get_stylesheet_directory_uri() . '/assets/image/1/figure_gray.png'; ?>)");
			}
		}

		for (var i = 1; i <= 4; ++i)
		{
			var obj_name = '#chart' + i;

			if (i == index)
			{
				$(obj_name).show();
			}
			else
			{
				$(obj_name).hide();
			}
		}
	}

</script>

<div id="research">
	<div class="header">
		<div class="wrap">
			<div class="header-title">Quantamental Research</div>
			<div class="header-content">Since 2012, we are one of the few earliest company to apply quantamental method in investment.</div>
		</div>
	</div>

	<div class="s1">
		<div class="wrap">
			<div class="section-title" style="top: 54px;">
				<div class="section-title-mark"></div>
				<div class="section-title-line"></div>
				<div class="section-title-text">Goldpebble Strength</div>
			</div>

			<div class="s1-text">With both infinite data and processing technology, Goldpebble has been able to develop continious edge in generating quantamental research, doing alternative investing and leading blockchain applications.</div>
		</div>
	</div>

	<div class="s2">
		<div class="wrap">
			<div class="section-title" style="top: 54px;">
				<div class="section-title-mark"></div>
				<div class="section-title-line"></div>
				<div class="section-title-text"><font style="font-family: 'Georgia Italic'">Quantamental</font> leads to Precision</div>
			</div>
			
			<div id="btn1" class="s2-btn" style="top: 257px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/1/figure_orange.png'; ?>);" onclick="SwitchChart(1);">
				<div class="s2-btn-text">MOMO<span style="font-size: 14px">(USDmn)</span></div>
			</div>

			<div id="btn2"  class="s2-btn" style="top: 347px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/1/figure_gray.png'; ?>)" onclick="SwitchChart(2);">
				<div class="s2-btn-text">YY<span style="font-size: 14px">(RMB'ooo)</span></div>
			</div>
				
			<div id="btn3"  class="s2-btn" style="top: 437px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/1/figure_gray.png'; ?>)" onclick="SwitchChart(3);">
				<div class="s2-btn-text">Tencent<span style="font-size: 14px">(RMB bn)</span></div>
			</div>
				
			<div id="btn4"  class="s2-btn" style="top: 527px; background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/1/figure_gray.png'; ?>)" onclick="SwitchChart(4);">
				<div class="s2-btn-text">NetEase<span style="font-size: 14px">(RMB bn)</span></div>
			</div>

			<div id="chart1" class="s2-chart-mm"></div>
			<div id="chart2" class="s2-chart-yy" style="display: none;"></div>
			<div id="chart3" class="s2-chart-tx" style="display: none;"></div>
			<div id="chart4" class="s2-chart-ne" style="display: none;"></div>
				
			<div class="s2-line"></div>
		</div>
	</div>

	<div class="s3">
		<div class="wrap">
			<div class="s3-icon"></div>
			<div class="s3-title">Problem: from No Data to Too Much Data</div>
			<div class="s3-line"></div>
			<div class="s3-mark"></div>
			<div class="s3-text">With the development of data storage and processing capabilities, large scale data and information can now be digitized and stored. Search engine technology and crowdsourcing make information, data and knowledge easily accessible.<br/><br/>The challenge in this new era is, how to process this deluge of data and information into knowledge and wisdom to generate investing edge for fundamental invesots.</div>
		</div>
	</div>

	<div class="s4">
		<div class="wrap">
			<div class="section-title" style="top: 58px;">
				<div class="section-title-mark"></div>
				<div class="section-title-line"></div>
				<div class="section-title-text">Goldpebble Advantages</div>
			</div>

			<div class="s4-container s4c1">
				<div class="s4c1-icon"></div>
				<div class="s4-title" style="top: 210px;">Longest Track Record</div>
				<div class="s4-line" style="top: 274px;"></div>
				<div class="s4-mark" style="background-color: #00647b; top: 268px;"></div>
				<div class="s4-text" style="top: 295px;">Since 2012, Goldpebble has been pioneering in providing quantamental research services to world-top investors. With the longest track record, Goldpebble is the first research company to adopt big data and cloud computing technologies in building investing edge.<br/><br/>Goldpebble's alernative data about companies' key operation metrics have been more accurate than Wall Street analysis for more than 20 quarters. The companies covered</div>
			</div>

			<div class="s4-container s4c2">
				<div class="s4c2-icon"></div>
				<div class="s4-title" style="top: 330px;">Not Only Data, But Also Fundamentals</div>
				<div class="s4-line" style="top: 304px;"></div>
				<div class="s4-mark" style="background-color: #f46d01; top: 305px;"></div>
				<div class="s4-text" style="top: 0px;">Goldpebble combines in-depth fundamental analysis with advanced quantitative research in its research in equities and macro issues.<br/><br/>With quantamental investing edge, Goldpebble can precisely estimate companies' financials, understand the subtle trend of market, and figure out firms' potentials that may lead to real edge over the whole market.</div>
			</div>

			<div class="s4-container s4c3">
				<div class="s4c3-icon"></div>
				<div class="s4-title" style="top: 290px;">Systems Make Things Different</div>
				<div class="s4-line" style="top: 374px;"></div>
				<div class="s4-mark" style="background-color: #00647b; top: 368px;"></div>
				<div class="s4-text" style="top: 390px;">Supplemented by leading technology in big data processing, Goldpebble extends its experties in investment research.<br/><br/>Goldpebble has built several proprietary systems, including GP HIDEN, GP CORE, GP OS and GP Psyc, and provides the best quantamental research service in China to global mutual funds, hedge funds, corporate leaders and family offices.</div>
			</div>
		</div>
	</div>

	<div class="s5">
		<div class="wrap">
			<div class="section-title" style="top: 58px;">
				<div class="section-title-mark"></div>
				<div class="section-title-line"></div>
				<div class="section-title-text">Goldpebble Systems</div>

				<div class="s5-title" style="top: 91px;">GP HIDEN</div>
				<div class="s5-title" style="top: 91px; padding-left: 145px;">Goldpebble Human Intelligence Data Expert Neuron System</div>
				<div class="s5-line" style="top: 143px;"></div>
				<div class="s5-mark" style="top: 137px; width: 114px;"></div>
				<div class="s5-icon1"></div>
				<div class="s5-text" style="padding-left: 361px; top: 195px;">GP HIDEN processes unstructured language and images into a structured database. Sources range from news portals, company websites and company filings to Twitter, Weibo and other social media networks. We developed our own Natural Language Processing (NLP) semantic technology to find relevant and actionable information at the same time leveraging our deep domain knowledge from industry experts.</div>

				<div class="s5-title" style="top: 465px;">GP CORE</div>
				<div class="s5-title" style="top: 465px; padding-left: 143px;">Goldpebble Core Data Services</div>
				<div class="s5-line" style="top: 518px;"></div>
				<div class="s5-mark" style="top: 512px; width: 112px;"></div>
				<div class="s5-icon2"></div>
				<div class="s5-text" style="top: 560px; width: 700px;">GP Core generates high frequency, real time data from structured data sources:<br/>- Traditional data sources: company filings, industry and macro data<br/>- Big data sources: social networks, search engines, ecommerce transactions</div>

				<div class="s5-title" style="top: 760px;">GP OS</div>
				<div class="s5-title" style="top: 760px; padding-left: 108px;">Goldpebble Offline Services</div>
				<div class="s5-line" style="top: 811px;"></div>
				<div class="s5-mark" style="top: 806px; width: 75px;"></div>
				<div class="s5-icon3"></div>
				<div class="s5-text" style="padding-left: 366px; top: 880px;">The missing component of data applications is normally unavailable information or unverifiable correlations. Goldpebble has built its own offline survey system and maintains a rela-time responsive team that covers 2,400 cities across China with high accessibility, flexibility and quality.</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>