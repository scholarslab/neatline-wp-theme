<?php
/*
Template Name: Multi-page, Full Content
*/
?>

<?php get_header(); ?>

<?php include_once (TEMPLATEPATH . "/childnav.php"); ?>

<div id="page-hdr">
	<h2 class="pagetitle"><?php if($section_title) { echo $section_title; } else { the_title(); } ?></h2>
</div>
	
	<div id="content-wrapper" class="wrapper">

	<div id="widecolumn">
		
		<?php if($section_title) { ?><h2 class="posttitle"><?php the_title(); ?></h2><?php } ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
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
		<?php include (TEMPLATEPATH . "/loop_multi-full.php"); ?>
		<?php endwhile; ?>
		<?php if ($alt=='alt') { ?>
					</div><!--/final row-->
		<?php } ?>
				</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	
	</div>

<?php get_footer(); ?>