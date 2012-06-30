<article <?php post_class(); ?>>

<?php
$download = get_post_meta( $post->ID , 'plugin_download' , true );
$github = get_post_meta( $post->ID , 'plugin_github_page' , true );
$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'full' ) ;
$image = $image[0];
?>

<h2><?php the_title(); ?></h2>

<?php if ($image) : ?>
<a href="<?php the_permalink(); ?>" class="plugin-screen">
  <img src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" />
</a>
<?php endif; ?>

<div class="content">
  <?php the_excerpt(); ?>
  <p><a href="<?php the_permalink(); ?>">Learn More</a> · <a href="<?php echo $download; ?>">Download</a></p>
</div>

</article>
