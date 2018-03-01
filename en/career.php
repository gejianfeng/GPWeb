<?php
/*
Template Name: career.php
 */
?>

<?php get_header(); ?>

<?php get_top_banner(); ?>

<script type="text/javascript">

	var bAnimPlayed = false;

	//$(window).scroll(function() {
	function OnScreenScrolled()
	{
		if (!bAnimPlayed)
		{
			var cp_div = document.getElementById("path");
			var bottomPos = cp_div.offsetTop + cp_div.offsetHeight;
			if (bottomPos >= $(window).scrollTop() && bottomPos < ($(window).scrollTop()+$(window).height())) {
				bAnimPlayed = true;

				$("#point1").animate({"opacity" : "1"}, 200);

				$("#line11").delay(200).animate({"opacity" : "1"}, 200);
				$("#line12").delay(200).animate({"opacity" : "1"}, 200);

				$("#sp11").delay(200).animate({"opacity" : "1"}, 200);
				$("#sp12").delay(200).animate({"opacity" : "1"}, 200);

				$("#st11").delay(400).animate({"opacity" : "1"}, 200);
				$("#st12").delay(400).animate({"opacity" : "1"}, 200);

				$("#point2").delay(700).animate({"opacity" : "1"}, 200);

				$("#line21").delay(900).animate({"opacity" : "1"}, 200);
				$("#line22").delay(900).animate({"opacity" : "1"}, 200);

				$("#sp21").delay(900).animate({"opacity" : "1"}, 200);
				$("#sp22").delay(900).animate({"opacity" : "1"}, 200);

				$("#st21").delay(1100).animate({"opacity" : "1"}, 200);
				$("#st22").delay(1100).animate({"opacity" : "1"}, 200);

				$("#point3").delay(1300).animate({"opacity" : "1"}, 200);

				$("#line31").delay(1600).animate({"opacity" : "1"}, 200);
				$("#line32").delay(1600).animate({"opacity" : "1"}, 200);

				$("#sp31").delay(1600).animate({"opacity" : "1"}, 200);
				$("#sp32").delay(1600).animate({"opacity" : "1"}, 200);

				$("#st31").delay(1800).animate({"opacity" : "1"}, 200);
				$("#st32").delay(1800).animate({"opacity" : "1"}, 200);

				$("#point4").delay(2100).animate({"opacity" : "1"}, 200);

				$("#line41").delay(2300).animate({"opacity" : "1"}, 200);
				$("#line42").delay(2300).animate({"opacity" : "1"}, 200);

				$("#sp41").delay(2300).animate({"opacity" : "1"}, 200);
				$("#sp42").delay(2300).animate({"opacity" : "1"}, 200);

				$("#st41").delay(2500).animate({"opacity" : "1"}, 200);
				$("#st42").delay(2500).animate({"opacity" : "1"}, 200);

				$("#point5").delay(2800).animate({"opacity" : "1"}, 200);

				$("#line51").delay(3000).animate({"opacity" : "1"}, 200);
				$("#line52").delay(3000).animate({"opacity" : "1"}, 200);

				$("#sp51").delay(3000).animate({"opacity" : "1"}, 200);
				$("#sp52").delay(3000).animate({"opacity" : "1"}, 200);

				$("#st51").delay(3200).animate({"opacity" : "1"}, 200);
				$("#st52").delay(3200).animate({"opacity" : "1"}, 200);

				$("#point6").delay(3500).animate({"opacity" : "1"}, 200);

				$("#line61").delay(3700).animate({"opacity" : "1"}, 200);
				$("#line62").delay(3700).animate({"opacity" : "1"}, 200);

				$("#sp61").delay(3700).animate({"opacity" : "1"}, 200);
				$("#sp62").delay(3700).animate({"opacity" : "1"}, 200);

				$("#st61").delay(3900).animate({"opacity" : "1"}, 200);
				$("#st62").delay(3900).animate({"opacity" : "1"}, 200);
			}
		}
	};

</script>

<div id="career">
	<div class="header">
		<div class="wrap">
			<div class="header-title">Career</div>
			<div class="header-line"></div>
			<div id="btnApply" class="header-btn" onmousemove="$('#btnApplyText').css('color', 'rgb(0, 100, 121)'); $('#btnApply').css('background-image', 'url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/button_apply_now_hover.png'; ?>)');" onmouseout="$('#btnApplyText').css('color', 'rgb(255, 255, 255)'); $('#btnApply').css('background-image', 'url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/button_apply_now.png'; ?>)');" onclick="SwitchPage('mailto:hr@goldpebble.com');">
				<div id="btnApplyText" class="header-btn-text">Apply Now</div>
			</div>
		</div>
	</div>

	<div class="s1">
		<div class="wrap">
			<div class="section-mark" style="top: 55px; background-color: #006579;"></div>
			<div class="section-title" style="top: 50px; color: #333333;">What Goldpebble Expects</div>
			<div class="section-line" style="top: 95px; background-color: #3e4d53;"></div>

			<div class="s1-text">We are truth seekers, problem solvers and people developers. We are finding solutions to combine investments and technologies through collaborative work of people from diversified background.</div>
		</div>
	</div>

	<div id="path" class="s2">
		<div class="wrap">
			<div class="section-mark" style="top: 55px; background-color: #006579;"></div>
			<div class="section-title" style="top: 50px; color: #333333;">Career Path</div>
			<div class="section-line" style="top: 95px; background-color: #3e4d53;"></div>

			<div class="s2-image"></div>

			<div id="point1" class="s2-point" style="left:101px;"></div>
			<div id="point2" class="s2-point" style="left:264px;"></div>
			<div id="point3" class="s2-point" style="left:427px;"></div>
			<div id="point4" class="s2-point" style="left:590px;"></div>
			<div id="point5" class="s2-point" style="left:753px;"></div>
			<div id="point6" class="s2-point" style="left:916px;"></div>

			<div id="line11" class="s2-line" style="left: 104px; top: 200px;"></div>
			<div id="line12" class="s2-line" style="left: 104px; top: 256px;"></div>

			<div id="line21" class="s2-line" style="left: 267px; top: 200px;"></div>
			<div id="line22" class="s2-line" style="left: 267px; top: 256px;"></div>

			<div id="line31" class="s2-line" style="left: 430px; top: 200px;"></div>
			<div id="line32" class="s2-line" style="left: 430px; top: 256px;"></div>

			<div id="line41" class="s2-line" style="left: 593px; top: 200px;"></div>
			<div id="line42" class="s2-line" style="left: 593px; top: 256px;"></div>

			<div id="line51" class="s2-line" style="left: 756px; top: 200px;"></div>
			<div id="line52" class="s2-line" style="left: 756px; top: 256px;"></div>

			<div id="line61" class="s2-line" style="left: 919px; top: 200px;"></div>
			<div id="line62" class="s2-line" style="left: 919px; top: 256px;"></div>

			<div id="sp11" class="s2-sp" style="left: 102px; top: 197px"></div>
			<div id="sp12" class="s2-sp" style="left: 102px; top: 295px"></div>

			<div id="sp21" class="s2-sp" style="left: 265px; top: 197px"></div>
			<div id="sp22" class="s2-sp" style="left: 265px; top: 295px"></div>

			<div id="sp31" class="s2-sp" style="left: 428px; top: 197px"></div>
			<div id="sp32" class="s2-sp" style="left: 428px; top: 295px"></div>

			<div id="sp41" class="s2-sp" style="left: 591px; top: 197px"></div>
			<div id="sp42" class="s2-sp" style="left: 591px; top: 295px"></div>

			<div id="sp51" class="s2-sp" style="left: 754px; top: 197px"></div>
			<div id="sp52" class="s2-sp" style="left: 754px; top: 295px"></div>

			<div id="sp61" class="s2-sp" style="left: 917px; top: 197px"></div>
			<div id="sp62" class="s2-sp" style="left: 917px; top: 295px"></div>

			<div id="st11" class="s2-text" style="left: 87px; top: 160px; font-size: 22px;">PTA</div>
			<div id="st12" class="s2-text" style="left: 67px; top: 305px; font-size: 24px;">0<span style="font-size: 18px;">Months</span></div>

			<div id="st21" class="s2-text" style="left: 170px; top: 128px; font-size: 22px;">Intern<br/>(Assistant Analyst)</div>
			<div id="st22" class="s2-text" style="left: 230px; top: 305px; font-size: 24px;">3<span style="font-size: 18px;">Months</span></div>

			<div id="st31" class="s2-text" style="left: 390px; top: 160px; font-size: 22px;">Analyst</div>
			<div id="st32" class="s2-text" style="left: 380px; top: 305px; font-size: 24px;">15<span style="font-size: 18px;">Months</span></div>

			<div id="st41" class="s2-text" style="left: 525px; top: 160px; font-size: 22px;">Senior Analyst</div>
			<div id="st42" class="s2-text" style="left: 543px; top: 305px; font-size: 24px;">39<span style="font-size: 18px;">Months</span></div>

			<div id="st51" class="s2-text" style="left: 713px; top: 160px; font-size: 22px;">Principle</div>
			<div id="st52" class="s2-text" style="left: 708px; top: 305px; font-size: 24px;">63<span style="font-size: 18px;">Months</span></div>

			<div id="st61" class="s2-text" style="left: 885px; top: 160px; font-size: 22px;">Partner</div>
			<div id="st62" class="s2-text" style="left: 875px; top: 305px; font-size: 24px;">99<span style="font-size: 18px;">Months</span></div>
		</div>
	</div>

	<div class="s3">
		<div class="wrap">
			<div class="s3-icon"></div>
			<div class="s3-text">Coldpebble actively recruits passionate, open-minded, and accomplished people from around the world. If you are interested in pursuing a career with Goldpebble, please apply by email:</div>
			<div class="s3-line"></div>
			<div class="s3-btn">
				<div class="s3-btn-text" onclick="SwitchPage('mailto:hr@goldpebble.com');">hr@goldpebble.com</div>
			</div>
		</div>
	</div>

	<div class="s4">
		<div class="wrap">
			<div class="section-mark" style="top: 55px; background-color: #ffffff;"></div>
			<div class="section-title" style="top: 50px; color: #ffffff;">Team</div>
			<div class="section-line" style="top: 95px; background-color: #ffffff;"></div>

			<div class="s4-text">Goldpebble's strategy is based on over 50 years' collective experience among the partners in areas including investment research/management, due diligence in both the public and private markets, and global macro. Goldpebble employs over a dozen professionals globally with an additional 70 engineers and survey professionals throughout China.</div>
		</div>
	</div>

	<div class="s5">
		<div class="wrap">
			<div class="section-mark" style="top: 55px; background-color: #ffffff;"></div>
			<div class="section-title" style="top: 50px; color: #ffffff;">Partners &amp; Advisor</div>
			<div class="section-line" style="top: 95px; background-color: #ffffff;"></div>

			<div class="s5-frame" style= "left: -15px">
				<div class="s5-icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/icon_photo.png'; ?>)"></div>
				<div class="s5-name">M. Adnan Gilani</div>
				<div class="s5-line"></div>
				<div class="s5-linkin"></div>
				<div class="s5-position">Partner</div>

				<div class="s5-text">Co-Founder, Head of Macro Strategy, has had a career in capital markets and international finance spanning almost two decades. He has led FX, Emerging Markets and Derivatives units in Goldman Sachs, HSBC and Citigroup. Adnan was also Director of the Debt Office in the Pakistan Ministry of Finance after which he started an Asia Infrastructure/Macro fund in New York. He has degrees in Chemical Engineering and Finance from Wharton and did his graduate studies at the University of Chicago in Analytic Finance.</div>
			</div>

			<div class="s5-frame" style= "left: 334px">
				<div class="s5-icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/icon_photo.png'; ?>)"></div>
				<div class="s5-name">Yifeng Mao</div>
				<div class="s5-line"></div>
				<div class="s5-linkin"></div>
				<div class="s5-position">Partner</div>

				<div class="s5-text">CFA, Founder, Head of Research, has developed investment strategies and institutions both on the buy and sell sides. He has managed global hedge funds in Singapore and Hong Kong as well as setting up a family office in the United States. Yifeng is considered a pre-eminent name in the data intensive bottoms-up investment research arena with particular stress in Chinese listed companies. He is a featured speaker on international business channels which solicit his indigenously developed proprietary cutting edge analysis techniques which have proven to be non-consensus and highly accurate. He graduated from Shanghai Jiao Tong University with dual undergraduate degrees in Computer Science and Finance.</div>
			</div>

			<div class="s5-frame" style= "right: -15px">
				<div class="s5-icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/icon_photo.png'; ?>)"></div>
				<div class="s5-name">Minglei Shi</div>
				<div class="s5-line"></div>
				<div class="s5-linkin"></div>
				<div class="s5-position">Advisor</div>

				<div class="s5-text">Senior Advisor, has over 15 years of investment experience in the Greater China region and advises on business strategy and product desgin for Goldpebble. He was previously the fund manager for China International Capital Corporation Asset Management (Hong Kong) and has extensive knowledge of QDII and RQFII products. Minglei has also served as the company director and portfolio manager for Everest Capital (Singapore), where he spent over ten years, and was the chief representative in Templeton Investment's Shanghai office, responsible for China business development. Mr. Shi has a masters in accounting and finance from the London School of Economics.</div>
			</div>
		</div>
	</div>

	<div class="s6">
		<div class="wrap">
			<div class="section-mark" style="top: 55px; background-color: #006579;"></div>
			<div class="section-title" style="top: 50px; color: #333333;">Analysts &amp; Associates</div>
			<div class="section-line" style="top: 95px; background-color: #3e4d53;"></div>

			<div class="s6-icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/icon_photo.png'; ?>); top: 145px; left: 0px;"></div>
			<div class="s6-name" style="left: 160px; text-align: left; top: 150px;">Calvin Sheng</div>
			<div class="s6-line" style="top: 185px; left: 160px;"></div>
			<div class="s6-position" style="top: 190px; left: 300px;">Leading Data Manager</div>
			<div class="s6-text" style="text-align: left; top: 225px; left: 160px;">He has a decade experience in parallel computing, distributed data mining, large scale data storage and cloud computing. Previously, he managed China's largest data center for both the public and private sectors.</div>
			
			<div class="s6-icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/icon_photo.png'; ?>); top: 335px; right: 0px;"></div>
			<div class="s6-name" style="right: 158px; text-align: right; top: 335px;">Sean Zhang</div>
			<div class="s6-line" style="top: 370px; right: 158px;"></div>
			<div class="s6-position" style="top: 380px; right: 315px;">Leading Program Manager</div>
			<div class="s6-text" style="text-align: right; top: 415px; right: 158px; width: 730px !important;">Sean has 12+ years of experience in software development and almost a decade in project management. Sean is now leading the R&amp;D team of 70 members and focusing on software application developments including big data analysis programs and mobile applications.</div>

			<div class="s6-icon" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/assets/image/4/icon_photo.png'; ?>); top: 550px; left: 0px;"></div>
			<div class="s6-name" style="left: 160px; text-align: left; top: 550px;">Stanley Shi</div>
			<div class="s6-line" style="top: 584px; left: 160px;"></div>
			<div class="s6-position" style="top: 590px; left: 300px;">Co-founder of Goldpebble Research</div>
			<div class="s6-text" style="text-align: left; top: 630px; left: 160px;">He was the Shanghai chief representative of large fund Franklin Templeton, the managing director and director of Singapore Company of Everest Capital, a hedge fund in US, and was responsible for CICC Asset Management in Hong Kong. Mr. Shi graduated from LSE with dual master degree in accounting and finance.</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>