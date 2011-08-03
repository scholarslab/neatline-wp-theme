<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="pitch">
    <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>

<div id="feature-set">
    <div id="features-images">
        <img src="<?php bloginfo('template_url'); ?>/images/screenshot-maps.jpg">
    </div>
    <nav>
        <ul>
            <li>Maps</li>
            <li>Features</li>
            <li>Timelines</li>
            <li>In Concert</li>
        </ul>
    </nav>
</div>

<?php get_footer(); ?>