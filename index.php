<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php include (TEMPLATEPATH . '/loop.php'); ?>

    <?php endwhile; ?>

    <?php include (TEMPLATEPATH . '/pagination.php'); ?>

    <?php else : ?>

    <h1><?php _e('Not Found','themename'); ?></h1>
    <p><?php _e('Sorry, that cannot be found','themename'); ?></p>

    <?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
