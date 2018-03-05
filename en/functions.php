<?php

function get_top_banner()
{
	$home_url = home_url();
	$ret = '';
	$ret .= "<div class='banner-container'>";
	$ret .= "<div id='banner'>";

		if (is_page('gpex'))
		{
			$ret .= "<div class='logo-gpex'></div>";

			$ret .= "<div class='lang-en-gpex'></div>";
			$ret .= "<div class='lang-cn-gpex'></div>";
		}
		else
		{
			$ret .= "<div class='logo' onclick='SwitchPage(\"" . $home_url . "\")'></div>";
			$ret .= "<div class='cp-name' onclick='SwitchPage(\"" . $home_url . "\")'>Goldpebble Research</div>";

			if (is_home())
			{
				$ret .= "<div class='nav home-selected'>Home</div>";
			}
			else
			{
				$ret .= "<div class='nav home' onclick='SwitchPage(\"" . $home_url . "\")' onmousemove='$(\"#banner_home_bl\").show();' onmouseout='$(\"#banner_home_bl\").hide();'>Home";
				$ret .= "<div id='banner_home_bl' class='home_line'></div>";
				$ret .= "</div>";
			}

			if (is_page('research'))
			{
				$ret .= "<div class='nav research-selected'><i>Quantamental</i> Research</div>";
			}
			else
			{
				$ret .= "<div class='nav research' onclick='SwitchPage(\"" . $home_url . "/index.php/research\")' onmousemove='$(\"#banner_research_bl\").show();' onmouseout='$(\"#banner_research_bl\").hide();'><i>Quantamental</i> Research";
				$ret .= "<div id='banner_research_bl' class='research_line'></div>";
				$ret .= "</div>";
			}

			if (is_page('investing'))
			{
				$ret .= "<div class='nav investing-selected'>Alernative Investing</div>";
			}
			else
			{
				$ret .= "<div class='nav investing' onclick='SwitchPage(\"" . $home_url . "/index.php/investing\")' onmousemove='$(\"#banner_investing_bl\").show();' onmouseout='$(\"#banner_investing_bl\").hide();'>Alernative Investing";
				$ret .= "<div id='banner_investing_bl' class='investing_line'></div>";
				$ret .= "</div>";
			}

			if (is_page('blockchain'))
			{
				$ret .= "<div class='nav blockchain-selected'>Blockchain Application</div>";
			}
			else
			{
				$ret .= "<div class='nav blockchain' onclick='SwitchPage(\"" . $home_url . "/index.php/blockchain\")' onmousemove='$(\"#banner_blockchain_bl\").show();' onmouseout='$(\"#banner_blockchain_bl\").hide();'>Blockchain Application";
				$ret .= "<div id='banner_blockchain_bl' class='blockchain_line'></div>";
				$ret .= "</div>";
			}

			if (is_page('career'))
			{
				$ret .= "<div class='nav career-selected'>Career</div>";
			}
			else
			{
				$ret .= "<div class='nav career' onclick='SwitchPage(\"" . $home_url . "/index.php/career\")' onmousemove='$(\"#banner_career_bl\").show();' onmouseout='$(\"#banner_career_bl\").hide();'>Career";
				$ret .= "<div id='banner_career_bl' class='career_line'></div>";
				$ret .= "</div>";
			}


			//$ret .= "<div class='nav home'>Home</div>";
			//$ret .= "<div class='nav research'>Quantamental Research</div>";
			//$ret .= "<div class='nav investing'>Alernative Investing</div>";
			//$ret .= "<div class='nav blockchain'>Blockchain Application</div>";
			//$ret .= "<div class='nav career'>Career</div>";
			
			$ret .= "<div class='lang-en'></div>";
			$ret .= "<div class='lang-cn'></div>";
		}
	$ret .= "</div>";
	$ret .= "</div>";
	echo $ret;
}

?>