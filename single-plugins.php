<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
$video = get_post_meta( $post->ID , 'plugin_video' , true );
$video_link = get_post_meta( $post->ID , 'plugin_video-link' , true );
$download = get_post_meta( $post->ID , 'plugin_download' , true );
$image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' ) ;
$resized_image = get_bloginfo('template_directory').'/scripts/timthumb.php?src='.$image[0].'&amp;w=230&amp;h=170&amp;q=100&amp;zc=1';
$more_info = get_post_meta( $post->ID , 'plugin_additional' , true );
?>

<?php if(is_single()) : ?>
<div class="deck">Plugins</div>
<h1><?php the_title(); ?></h1>
<?php if($video) : ?>
<?php echo ( do_shortcode( get_post_meta( $post->ID , 'plugin_video' , true ) ) ); ?>
<?php endif; ?>
<?php the_content(); ?>
<?php else : ?>
<h3><?php the_title(); ?></h3>
<?php if($video) : ?>
<?php echo do_shortcode($video); ?>
<?php endif; ?>
<?php the_content(); ?>
<?php endif; ?>
<?php if($download || $video_link) : ?>
<?php if($video_link) : ?><a href="<?php echo $video_link; ?>" title="<?php the_title_attribute(); ?>" class="colorbox-link more download">View Larger Video</a><?php endif; ?>
<?php if($download) : ?><a href="<?php echo $download; ?>" title="Download <?php the_title_attribute(); ?>" class="more download">Download</a><?php endif; ?>
<?php endif; ?>
<?php if($more_info) : ?>
<div class="info">
<?php echo $more_info; ?>
</div>
<?php endif; ?>
</div>

</div>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
