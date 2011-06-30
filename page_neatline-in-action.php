<?php
/*
Template Name: Neatline in Action
*/
?>

<?php get_header(); ?>

<?php include_once (TEMPLATEPATH . "/childnav.php"); ?>

<div id="page-hdr">
	<h2 class="pagetitle"><?php if($section_title) { echo $section_title; } else { the_title(); } ?></h2>
</div>
	
	<div id="content-wrapper" class="wrapper">

	<div id="widecolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php if($section_title) { ?><h2 class="posttitle"><?php the_title(); ?></h2><?php } ?>
		
		<div class="post">
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	

		<?php $multi_query = new WP_Query('static=true&post_status=publish&posts_per_page=-1&post_parent='.$post->ID.'&orderby=menu_order&order=ASC'); ?>
		<?php $alt = ''; ?>
		<?php if($multi_query->have_posts()) : ?>
				<div class="multipage clearfloat">
		<?php while ($multi_query->have_posts()) : $multi_query->the_post(); ?>

<?php if ($alt=='') { ?>
			<div class="row clearfloat">
<?php } ?>
				<div class="entry entry-full<?php if ($alt=='') { $alt = 'alt'; } else { echo ' '.$alt; $alt = ''; } ?>">
<?php
if ( has_post_thumbnail() ) :
	$image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' ) ;
	$resized_image = get_bloginfo('template_directory').'/scripts/timthumb.php?src='.$image[0].'&amp;w=200&amp;h=140r&amp;q=100&amp;zc=1';
?>
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
					<img class="alignleft" src="<?php echo $resized_image; ?>" alt="<?php the_title(); ?>" border="0" />
					</a>
<?php endif; ?>
<?php if ( has_post_thumbnail() ) : ?>
					<div class="text">
<?php endif; ?>
					<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<?php the_content(); ?>
					<a class="more" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">Learn More</a>
<?php if ( has_post_thumbnail() ) : ?>
					</div>
<?php endif; ?>
			</div>
			
<?php if ($alt=='') { ?>
			</div><!--/row-->
<?php } ?>

		<?php endwhile; ?>
		<?php if ($alt=='alt') { ?>
					</div><!--/final row-->
		<?php } ?>
				</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	
	</div>

<?php get_footer(); ?>