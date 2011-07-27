<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php dynamictitles(); ?></title>

<!-- Style sheets -->
<link href="http://fonts.googleapis.com/css?family=Crimson+Text:regular,regularitalic,600,600italic,bold,bolditalic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<?php if(is_front_page()) : ?><link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/style_home.css" /> <?php endif; ?>

<!-- Feeds and Pingbacks -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

<?php wp_head(); ?>

</head>

<body <?php echo body_class(); ?>>
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