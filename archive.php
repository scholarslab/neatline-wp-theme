<?php get_header(); ?>

    <?php if (have_posts()) : $post = $posts[0]; ?>
    <h1 class="posttitle"><?php neatline_blog_archives_title(); ?></h1>


		<?php while (have_posts()) : the_post(); ?>
		
            <?php include (TEMPLATEPATH . '/loop.php'); ?>

		<?php endwhile; ?>
	
		<?php include (TEMPLATEPATH . '/pagination.php'); ?>
		
	<?php else : ?>

		<h1><?php _e('Not Found','themename'); ?></h1>
		
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>