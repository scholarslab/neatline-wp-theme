<?php get_header(); ?>

<div id="page-hdr">
	<div class="hdr-feed">
		<h2 class="pagetitle"><?php _e('Author Archives','themename'); ?></h2>
		<a class="rss" href="<?php echo get_author_posts_url( $author, ""); ?>feed/"><img src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="rss" /></a>
	</div>
</div>
	
<div id="content-wrapper" class="wrapper">
	<div id="content">

	<?php if (have_posts()) : ?>

        <div id="writer">
        <?php
            global $wp_query;
            $curauth = $wp_query->get_queried_object();
            echo get_avatar( $curauth->user_email, '80' );
        ?>
        <p><?php echo $curauth->user_description; ?></p>
        </div>

			<?php while (have_posts()) : the_post(); ?>

					<?php include (TEMPLATEPATH . '/loop.php'); ?>

			<?php endwhile; ?>
		
		<?php include (TEMPLATEPATH . '/pagination.php'); ?>
		
	<?php else : ?>

		<h2 class="pagetitle"><?php _e('Search Results','themename'); ?></h2>
		<p><?php _e('No posts found.','themename'); ?></p>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>