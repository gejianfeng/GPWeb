<?php
/*
Template Name: blockchain.php
 */
?>

<?php get_header(); ?>

<?php get_top_banner(); ?>

<div id="blockchain">
	<div class="header">
		<div class="wrap">
			<div class="header-title">Blockchain Application</div>
			<div class="header-content">Goldpebble improves social welfare and creates business chances<br/>through developing blockchain applications</div>
		</div>
	</div>

	<div class="s1">
		<div class="wrap">
			<div class="section-title">
				<div class="section-mark"></div>
				<div class="section-line"></div>
				<div class="section-title-text">Goldpebble Strength</div>
			</div>

			<div class="s1-text">Pionteered by Bitcoin, blockchain technology is a decentralized and distributed ledger witch is open and secure. The technology enables transactions without the need of a trusted authority or central sever. Cryptocurrency (represented by Bitcoin) provided the prototype for the application into digital currency, and smart contract platform (represented by Ethereum) further broadens the boundary. Blockchain has gone much further from the backbone of cryptocurrencies to a technology with potentials to renew the landscape of several existing markets. Goldpebble also develops blockchain applications.</div>
		</div>
	</div>

	<div class="s2">
		<div class="wrap">
			<div class="section-title">
				<div class="section-mark"></div>
				<div class="section-line"></div>
				<div class="section-title-text">Blockchain Advantage</div>
			</div>

			<div class="s2-frame s2-frame-1">
				<div class="s2-frame-title">Decentralization</div>
				<div class="s2-frame-content">Security with Distributed<br/>System</div>
			</div>

			<div class="s2-frame s2-frame-2">
				<div class="s2-frame-title">Openness</div>
				<div class="s2-frame-content">Trust with Transparency</div>
			</div>

			<div class="s2-frame s2-frame-3">
				<div class="s2-frame-title">Ecosystem</div>
				<div class="s2-frame-content">Growth with Collective<br/>Self Interests</div>
			</div>
		</div>
	</div>

	<div class="s3">
		<div class="wrap">
			<div class="section-title">
				<div class="section-mark"></div>
				<div class="section-line"></div>
				<div class="section-title-text">Blockchain Applications</div>
			</div>

			<div class="s3-frame s3-frame-1" onclick="SwitchPage('<?php echo home_url(); ?>/index.php/gpex');">
				<div class="s3-frame-title">GPEX</div>
				<div class="s3-frame1-content">Under Planning</div>
			</div>

			<div class="s3-frame s3-frame-2" onclick="SwitchPage('<?php echo home_url(); ?>/../../livecoin/en');">
				<div class="s3-frame-title"><font style="color: #fa7015">L</font>IVECO<font style="color: #fa7015">IN</font>S</div>
				<div class="s3-frame2-content">Decentralized Live Event Ecosystem</div>
				<div class="btn-lm">
					<div class="btn-lm-text">Learn More</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>