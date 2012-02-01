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

// Loop through our Neatline Plugins posts

$neatlinePlugins = new WP_Query(array('post_type' => 'plugins', 'order_by' => 'menu_order'));

if ($neatlinePlugins->have_posts()) : ?>

<div id="screenshots" class="container">
<?php while ($neatlinePlugins->have_posts()) : $neatlinePlugins->the_post(); ?>

<a class="screenshot" href="<?php the_permalink(); ?>">
  <h2><?php the_title(); ?></h2>
  <?php if (has_post_thumbnail()) {
      the_post_thumbnail('fullsize');
    }
  ?>
  <?php the_excerpt(); ?>
</a>

<?php endwhile; ?>
</div>

<?php wp_reset_query(); endif; ?>

<?php
/*
// Get the page object for "Neatline in Action"
$inActionPage = get_page_by_title( 'Neatli In ');
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
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
              the_post_thumbnail();
            }
            ?>
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
<?php endif; */ ?>

<?php get_footer(); ?>
