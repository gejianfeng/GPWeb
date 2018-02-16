<?php

function get_top_banner()
{
	$home_url = home_url();
	$ret = '';
	$ret .= "<div id='banner'>";

		if (is_page('gpex'))
		{
			$ret .= "<div class='logo-gpex'></div>";
		}
		else
		{
			$ret .= "<div class='logo'></div>";
			$ret .= "<div class='cp-name'>Goldpebble Research</div>";

			if (is_home())
			{
				$ret .= "<div class='nav home-selected'>Home</div>";
			}
			else
			{
				$ret .= "<div class='nav home' onclick='SwitchPage(\"" . $home_url . "\")'>Home</div>";
			}

			if (is_page('research'))
			{
				$ret .= "<div class='nav research-selected'><i>Quantamental</i> Research</div>";
			}
			else
			{
				$ret .= "<div class='nav research' onclick='SwitchPage(\"" . $home_url . "/index.php/research\")'><i>Quantamental</i> Research</div>";
			}

			if (is_page('investing'))
			{
				$ret .= "<div class='nav investing-selected'>Alernative Investing</div>";
			}
			else
			{
				$ret .= "<div class='nav investing' onclick='SwitchPage(\"" . $home_url . "/index.php/investing\")'>Alernative Investing</div>";
			}

			if (is_page('blockchain'))
			{
				$ret .= "<div class='nav blockchain-selected'>Blockchain Application</div>";
			}
			else
			{
				$ret .= "<div class='nav blockchain' onclick='SwitchPage(\"" . $home_url . "/index.php/blockchain\")'>Blockchain Application</div>";
			}

			if (is_page('career'))
			{
				$ret .= "<div class='nav career-selected'>Career</div>";
			}
			else
			{
				$ret .= "<div class='nav career' onclick='SwitchPage(\"" . $home_url . "/index.php/career\")'>Career</div>";
			}


			//$ret .= "<div class='nav home'>Home</div>";
			//$ret .= "<div class='nav research'>Quantamental Research</div>";
			//$ret .= "<div class='nav investing'>Alernative Investing</div>";
			//$ret .= "<div class='nav blockchain'>Blockchain Application</div>";
			//$ret .= "<div class='nav career'>Career</div>";
		}

		$ret .= "<div class='lang-en'></div>";
		$ret .= "<div class='lang-cn'></div>";
	$ret .= "</div>";
	echo $ret;
}

?>