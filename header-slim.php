<?php
	global $detect;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php if(wp_is_mobile()){ echo 'mobile'; } ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png">
	<script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145789708-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-145789708-1');
	</script>
</head>

<body <?php body_class(); ?>>
