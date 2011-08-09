<!DOCTYPE html>
<!--[if IEMobile 7 ]><html class="ie iem7" ><![endif]-->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

<title><?php dynamictitles(); ?></title>

<!-- Style sheets -->
<link href="http://fonts.googleapis.com/css?family=Crimson+Text:regular,regularitalic,600,600italic,bold,bolditalic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<!-- enable HTML5 elements in IE7+8 --> 
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Feeds and Pingbacks -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
<?php
if (is_page('Homepage')) {
    wp_enqueue_script('jquery-cycle-all', get_bloginfo('template_url') . '/jquery.cycle.all.js', array('jquery'),null);
    wp_enqueue_script('neatline-scripts', get_bloginfo('template_url') . '/scripts.js', array('jquery'),null, true);
}
?>
<?php wp_head(); ?>

</head>

<body <?php echo body_class(); ?>>

<header role="banner" class="container">

    <h1 id="logo">
        <a href="<?php echo get_option('home'); ?>/" title="<?php _e('Home','themename'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/images/neatline-logo-rgb.png" alt="<?php bloginfo('name'); ?>" />
        </a>
    </h1>

    <nav id="sitenav">
        <?php wp_nav_menu('theme_location=header'); ?> 
    </nav>

</header><!--/masthead-->

<div id="content" role="main">
