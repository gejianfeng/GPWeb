<?php
/*
Template Name: footer.php
*/
?>
	<div id="footer">
		<div class="wrap">
			<div class="logo"></div>
			<div class="cp-name">Goldpebble Research</div>
			<div class="content">Goldpebble Research is a financial technology company focusing on building <br/>investing edge with proprietary quantamental data technology</div>

			<div class="split-line line1"></div>
			<div class="split-line line2"></div>

<?php
	$ret = '';

	if (is_page('gpex'))
	{
		$ret .= '<div class="outlink ol-wc-gpex"><span style="opacity: 0.8;">Wechat</span></div>';
		$ret .= '<div class="outlink ol-wb-gpex"><span style="opacity: 0.8;">Weibo</span></div>';
		$ret .= '<div class="outlink ol-fb-gpex"><span style="opacity: 0.8;">Facebook</span></div>';
		$ret .= '<div class="outlink ol-tw-gpex"><span style="opacity: 0.8;">Twitter</span></div>';
		$ret .= '<div class="outlink ol-yt-gpex"><span style="opacity: 0.8;">Youtube</span></div>';
	}
	else
	{
		$ret .= '<div class="outlink ol-wc"><span style="opacity: 0.8;">Wechat</span></div>';
		$ret .= '<div class="outlink ol-wb"><span style="opacity: 0.8;">Weibo</span></div>';
		$ret .= '<div class="outlink ol-fb"><span style="opacity: 0.8;">Facebook</span></div>';
		$ret .= '<div class="outlink ol-tw"><span style="opacity: 0.8;">Twitter</span></div>';
		$ret .= '<div class="outlink ol-yt"><span style="opacity: 0.8;">Youtube</span></div>';
	}

	echo $ret;

?>

			<div class="innerlink il-home">Home</div>
			<div class="innerlink il-research">Quantamental Research</div>
			<div class="innerlink il-investing">Alernative Investing</div>
			<div class="innerlink il-blockchain">Blockchain Applications</div>
			<div class="innerlink il-career">Career</div>
		</div>
	</div>
	</body>
</html>