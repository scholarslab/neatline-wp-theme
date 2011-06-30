<?php get_header(); ?>

<div id="page-hdr">
	<h2 class="pagetitle">Search</h2>
</div>

<div id="content-wrapper" class="wrapper">
	<div id="content">

	<h2>Search Results for "<em><?php the_search_query() ?></em>"</h2>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<?php include (TEMPLATEPATH . '/loop.php'); ?>

		<?php endwhile; ?>
		
		<?php include (TEMPLATEPATH . '/pagination.php'); ?>
        
	<?php else : ?>
		<p><?php _e('No posts found.','themename'); ?></p>
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>