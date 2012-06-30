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

<img class="splash" src="http://neatline.scholarslab.org/wp-content/uploads/2012/06/neatline-splash.jpg" />

<!--
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

<?php if($pluginCaption = get_post_meta( $post->ID , 'plugin_homepage_caption' , true )) : ?>
<div class="description"><?php echo $pluginCaption; ?></div>
<?php endif; ?>
</a>
<?php if ($post->menu_order == '1'): ?>
<ul id="neatline-meta-links">
  <li id="neatline-learn-more"><a href="<?php the_permalink(); ?>" title="Learn more about the Neatline plugin.">Get the Plugin</a></li>
  <li id="neatline-try-it"><a href="http://neatline.scholarslab.org" title="Try out Neatline.">Try the Demo</a></li>
  <li id="neatline-see-it"><a href="/neatline-in-action/" title="View some example exhibits of Neatline in action.">See it in Action</a></li>
</ul>
<div id="separate-components-note"><p>You can also use Neatline components separately.</p></div>
<?php endif; ?>
<?php endwhile; ?>
</div>
-->

<?php wp_reset_query(); endif; ?>

<?php get_footer(); ?>
