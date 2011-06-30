<?php get_header(); ?>

<?php if(is_front_page()) : ?>
	
	<?php include_once (TEMPLATEPATH . "/page_home.php"); ?>

<?php else : ?>

<div id="page-hdr">
	<div class="hdr-feed">
		<h2 class="pagetitle"><?php wp_title(''); ?></h2>
		<a class="rss" href="<?php echo get_bloginfo_rss('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="rss" /></a>
	</div>
</div>

<div id="content-wrapper" class="wrapper">
	<div id="content">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  
			<?php include (TEMPLATEPATH . '/loop.php'); ?>
		
			<?php endwhile; ?>
	
			<?php include (TEMPLATEPATH . '/pagination.php'); ?>
	
		<?php else : ?>
	
			<h2><?php _e('Not Found','themename'); ?></h2>
			<p><?php _e('Sorry, that cannot be found','themename'); ?></p>
			
		<?php endif; ?>
	
	</div><!--/content-->
	
	<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
