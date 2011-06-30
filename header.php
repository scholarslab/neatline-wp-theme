<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php dynamictitles(); ?></title>

<link href='http://fonts.googleapis.com/css?family=Crimson+Text:regular,regularitalic,600,600italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style_print.css" type="text/css" media="print" />

<?php if(is_front_page()) : ?><link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/style_home.css" /> <?php endif; ?>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

<?php wp_head(); ?>

</head>

<body <?php echo bodystyle(); ?>>
<div id="wrapper">

<div class="wrapper">
<div id="masthead">

	<h1 id="logo"><a href="<?php echo get_option('home'); ?>/" title="<?php _e('Home','themename'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo_print.gif" alt="<?php bloginfo('name'); ?>" border="0" /></a></h1>


	<div id="masthead-content">
<?php wp_nav_menu('theme_location=menu&menu_id=nav&sort_column=menu_order&container_class=navmenu&depth=1'); ?> 

<?php if(!is_front_page()) : ?>
	</div>

</div><!--/masthead-->
</div>
<div id="main">
<?php endif; ?>