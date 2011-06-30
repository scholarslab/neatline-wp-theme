<?php if ($alt=='') { ?>
			<div class="row clearfloat">
<?php } ?>
				<div class="entry<?php if ($alt=='') { $alt = 'alt'; } else { echo ' '.$alt; $alt = ''; } ?>">
<?php
if ( has_post_thumbnail() ) :
	$image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' ) ;
	$resized_image = get_bloginfo('template_directory').'/scripts/timthumb.php?src='.$image[0].'&amp;w=74&amp;h=75&amp;q=100&amp;zc=1';
?>
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
						<img src="<?php echo $resized_image; ?>" alt="<?php the_title(); ?>" />
					</a>
<?php endif; ?>
					<div class="text">
						<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
					</div>
				</div>
			
<?php if ($alt=='') { ?>
			</div><!--/row-->
<?php } ?>