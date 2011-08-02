<?php get_header(); ?>
<h1 class="posttitle"><?php echo post_type_archive_title(); ?></h1>

    <?php if (have_posts()) :
        query_posts( $query_string . '&orderby=menu_order&order=ASC&posts_per_page=-1' );
        while (have_posts()) : the_post(); ?>

        <?php include (TEMPLATEPATH . '/loop_plugin.php'); ?>

        <?php endwhile; ?>
        <?php include (TEMPLATEPATH . '/pagination.php'); ?>

    <?php else : ?>

        <h2><?php _e('Not Found','themename'); ?></h2>

    <?php endif; ?>

<?php get_footer(); ?>