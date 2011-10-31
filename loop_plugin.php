<?php if ($alt=='') { ?>
            <div class="row clearfloat">
<?php } ?>
                <div class="entry entry-full<?php if ($alt=='') { $alt = 'alt'; } else { echo ' '.$alt; $alt = ''; } ?>">

<?php
$video = get_post_meta( $post->ID , 'plugin_video' , true );
$video_link = get_post_meta( $post->ID , 'plugin_video-link' , true );
$download = get_post_meta( $post->ID , 'plugin_download' , true );
$github = get_post_meta( $post->ID , 'plugin_github_page' , true );
$image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' ) ;
$resized_image = get_bloginfo('template_directory').'/scripts/timthumb.php?src='.$image[0].'&amp;w=230&amp;h=170&amp;q=100&amp;zc=1';
$more_info = get_post_meta( $post->ID , 'plugin_additional' , true );
?>

<?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php echo $resized_image; ?>" alt="<?php the_title(); ?>" class="alignright" />
<?php endif; ?>

                    <div class="text<?php if(!has_post_thumbnail()) : ?> full-text<?php endif; ?>">
<?php if(is_single()) : ?>
                        <h2 class="posttitle"><?php the_title(); ?></h2>
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
                        <?php if($video_link) : ?><a href="<?php echo $video_link; ?>" title="<?php the_title_attribute(); ?>" class="colorbox-link more download">View Larger Video</a><?php endif; ?>
                        <?php if($download) : ?>
                            <a href="<?php echo $download; ?>" title="Download <?php the_title_attribute(); ?>" class="more download">Download</a>
                        <?php else: ?>
                            <span>In Progress</span>
                        <?php endif; ?>
                        <?php if($github) : ?>
                            <a href="<?php echo $github; ?>" class="more github">Follow Development on Github</a>
                        <?php endif; ?>
<?php if($more_info) : ?>
                        <div class="info">
                        <?php echo $more_info; ?>
                        </div>
<?php endif; ?>
                    </div>

                </div>

<?php if ($alt=='') { ?>
            </div><!--/row-->
<?php } ?>