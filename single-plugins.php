<?php get_header(); ?>

<h1 class="posttitle">Plugins</h1>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php include (TEMPLATEPATH . '/loop_plugin.php'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>