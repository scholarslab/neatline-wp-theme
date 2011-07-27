<?php
/*
Template Name: Collaborators
*/
?>

<?php get_header(); ?>



<div id="page-hdr">
	<h2 class="pagetitle"><?php if($section_title) { echo $section_title; } else { the_title(); } ?></h2>
</div>
	
	<div id="content-wrapper" class="wrapper">

	<div id="<?php if ($children || $numpages > '1') { ?>content<?php } else { ?>widecolumn<?php } ?>">
	
		<?php if($section_title) { ?><h2 class="posttitle"><?php the_title(); ?></h2><?php } ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post">
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	

		<?php $multi_query = new WP_Query('static=true&post_status=publish&posts_per_page=-1&post_parent='.$post->ID.'&orderby=menu_order&order=ASC'); ?>
		
		<?php if($multi_query->have_posts()) : while ($multi_query->have_posts()) : $multi_query->the_post(); ?>
			
			<h2><?php the_title(); ?></h2>
			
			<?php $multi_query2 = new WP_Query('static=true&post_status=publish&posts_per_page=-1&post_parent='.$post->ID.'&orderby=menu_order&order=ASC'); ?>
			<?php if($multi_query2->have_posts()) : ?>
				<div class="multipage collaborators clearfloat">
			<?php $alt = ''; ?>
			<?php while ($multi_query2->have_posts()) : $multi_query2->the_post(); ?>
<?php
$get_people = get_page_by_title('People');
$people_id = $get_people->ID;
$get_partners = get_page_by_title('Partners');
$partners_id = $get_partners->ID;

$image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' ) ;
$people_image = get_bloginfo('template_directory').'/scripts/timthumb.php?src='.$image[0].'&amp;w=110&amp;h=115&amp;q=100&amp;zc=1';
$logo = get_bloginfo('template_directory').'/scripts/timthumb.php?src='.$image[0].'&amp;w=150&amp;q=100&amp;zc=1';
?>
			
			
<?php if ($alt=='') { ?>
			<div class="row clearfloat">
<?php } ?>
				<div class="entry entry-full<?php if ($alt=='') { $alt = 'alt'; } else { echo ' '.$alt; $alt = ''; } ?>">
<?php
if ( has_post_thumbnail() ) :
	if( $post->post_parent == $partners_id || $post->post_parent == 46) : ?>
					<img src="<?php echo $logo; ?>" class="alignright no-border logo-image" alt="<?php the_title(); ?>" />	
	<?php else : ?>
					<img src="<?php echo $people_image; ?>" class="alignleft" alt="<?php the_title(); ?>" />
	<?php endif; ?>
					<div class="text">
<?php endif; ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
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
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
	
	</div>

<?php include_once (TEMPLATEPATH . "/sidebar-page.php"); ?>

<?php get_footer(); ?>