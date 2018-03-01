<?php
/*
Template Name: header.php
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>

		<script text="text/javascript">
			var refOffset = 0;
			const bannerHeight = 138;

			function SwitchPage(url)
			{
				window.location.href = url;
			}

			$(window).scroll(function() {
				var bannerWrapper = document.querySelector('#banner');

				const newOffset = window.scrollY || window.pageYOffset;

				if (newOffset > bannerHeight) {
					if (newOffset >= refOffset) {
						bannerWrapper.classList.remove('animateIn');
						bannerWrapper.classList.add('animateOut');
					} else {
						bannerWrapper.classList.remove('animateOut');
						bannerWrapper.classList.add('animateIn');
					}
					refOffset = newOffset;
				}

<?php
	if (is_page('career'))
	{
		echo "OnScreenScrolled();";
	}
?>
			});
		</script>
	</head>

	<body>