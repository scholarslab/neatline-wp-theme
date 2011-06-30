<?php get_header(); ?>

<div id="page-hdr">

	  <?php if (have_posts()) : $post = $posts[0]; if (is_category()) { ?>
		<div class="hdr-feed">
			<h2 class="pagetitle"><?php single_cat_title(); ?></h2>
			<a class="rss" href="<?php echo get_category_feed_link(); ?>feed/"><img src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="rss" /></a>
		</div>
 	  <?php } elseif( is_tag() ) { ?>
		<div class="hdr-feed">
			<h2 class="pagetitle"><?php _e('Tag Archive for','themename'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			<a class="rss" href="<?php echo get_category_feed_link(); ?>feed/"><img src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="rss" /></a>
		</div> 
 	  <?php } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php _e('Date Archive for','themename'); ?> <?php the_time('F jS, Y'); ?></h2>
 	  
 	  <?php } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php _e('Date Archive for','themename'); ?> <?php the_time('F, Y'); ?></h2>
 	  
      <?php } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php _e('Date Archive for','themename'); ?> <?php the_time('Y'); ?></h2>
	  
 	  <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives','themename'); ?></h2>
 	  <?php } ?>

</div>

<div id="content-wrapper" class="wrapper">
<div id="content">

		<?php while (have_posts()) : the_post(); ?>
		
            <?php include (TEMPLATEPATH . '/loop.php'); ?>

		<?php endwhile; ?>
	
		<?php include (TEMPLATEPATH . '/pagination.php'); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found','themename'); ?></h2>
		
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>