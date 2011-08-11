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
<?php

// Get the page object for "Neatline in Action"
$inActionPage = get_page_by_title( 'Neatline In Action');
if ($inActionPage):
    
    // Query WP for all the child pages for "Neatline in Action"
    $inActionChildQuery = new WP_Query('static=true&post_status=publish&posts_per_page=-1&post_parent='.$inActionPage->ID.'&orderby=menu_order&order=ASC');
    
    // If we get some results, we'll loop through them like semi-hot butter.
    if($inActionChildQuery->have_posts()) : ?>
        <div id="neatline-in-action">
            <h2>Neatline In Action</h2>
        <?php while ($inActionChildQuery->have_posts()) : $inActionChildQuery->the_post(); ?>
            <div class="entry">
            <?php
            // If the child page has a thumbnail, we should display that goodness.
            if ( has_post_thumbnail() ) :
                $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' ) ;
            ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
            <img class="alignleft" src="<?php echo $image; ?>" alt="<?php the_title(); ?>" border="0" />
            </a>
            <?php endif; ?>
            <div class="text">
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <?php the_content(); ?>
                <a class="more" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">Learn More</a>
            </div>
        </div>

        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>