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

<a class="screenshot" id="<?php echo str_replace(' ', '-', strtolower(get_the_title())); ?>" href="<?php the_permalink(); ?>">
  <h2><?php the_title(); ?></h2>
  <?php if (has_post_thumbnail()) {
      the_post_thumbnail('fullsize');
    }
  ?>
  <div class="description"><?php the_excerpt(); ?></div>
</a>
<?php if ($post->menu_order == '1'): ?>
<ul id="neatline-meta-links">
  <li id="neatline-learn-more"><a href="<?php the_permalink(); ?>" class="button">Get it!</a></li>
  <li id="neatline-try-it"><a href="http://neatline.scholarslab.org" class="button">Try It!</a></li>
</ul>
<p id="separate-components-note">You can also use Neatline components separately.</p>
<?php endif; ?>
<?php endwhile; ?>
</div>

<?php wp_reset_query(); endif; ?>

<?php get_footer(); ?>
