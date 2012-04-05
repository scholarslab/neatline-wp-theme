<article <?php post_class(); ?>>

<?php
$video = get_post_meta( $post->ID , 'plugin_video' , true );
$video_link = get_post_meta( $post->ID , 'plugin_video-link' , true );
$download = get_post_meta( $post->ID , 'plugin_download' , true );
$github = get_post_meta( $post->ID , 'plugin_github_page' , true );

$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'full' ) ;
$image = $image[0];
$more_info = get_post_meta( $post->ID , 'plugin_additional' , true );
?>

<h1><?php the_title(); ?></h1>
<?php if ($image) : ?>
<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
<?php endif; ?>
<div class="content">
  <?php the_excerpt(); ?>
  <?php if($more_info) : ?>
    <div class="info">
    <?php echo $more_info; ?>
    </div>
  <?php endif; ?>
</div>
<div class="plugin-links">
<?php if($download) : ?>
<span><a href="<?php echo $download; ?>" title="Download <?php the_title_attribute(); ?>" class="more download">Download</a></span>
<?php else: ?>
<span>In Progress</span>
<?php endif; ?>
<?php if($github) : ?>
<span><a href="<?php echo $github; ?>" class="more github">Follow <?php the_title(); ?> on Github</a></span>
<?php endif; ?>
</div>

</article>

