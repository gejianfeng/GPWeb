<?php

function get_top_banner()
{
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

			$ret .= "<div class='nav home'>Home</div>";
			$ret .= "<div class='nav research'>Quantamental Research</div>";
			$ret .= "<div class='nav investing'>Alernative Investing</div>";
			$ret .= "<div class='nav blockchain'>Blockchain Application</div>";
			$ret .= "<div class='nav career'>Career</div>";
		}

		$ret .= "<div class='lang-en'></div>";
		$ret .= "<div class='lang-cn'></div>";
	$ret .= "</div>";
	echo $ret;
}

?>