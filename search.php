<?php get_header(); ?>
<div id="primary">
<h1>Search Results for &#8220;<em><?php the_search_query() ?></em>&#8221;</h2>

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
