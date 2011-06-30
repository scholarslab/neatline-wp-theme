<?php get_header(); ?>

<div id="page-hdr">
	<h2 class="pagetitle"><?php echo get_the_title('22'); ?></h2>
</div>
	
<div id="content-wrapper" class="wrapper">

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 	
	<?php 
      // excludes this post from 'Related posts' in the sidebar
      $GLOBALS['current_id'] = $post->ID; 
      ?>
	 
		 <?php include (TEMPLATEPATH . '/loop.php'); ?>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','themename'); ?></p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
