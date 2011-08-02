<?php get_header(); ?>

<h1 class="posttitle">Search</h1>

    <h2>Search Results for "<em><?php the_search_query() ?></em>"</h2>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php include (TEMPLATEPATH . '/loop.php'); ?>

    <?php endwhile; ?>

    <?php include (TEMPLATEPATH . '/pagination.php'); ?>

    <?php else : ?>

    <p><?php _e('No posts found.','themename'); ?></p>

    <?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>