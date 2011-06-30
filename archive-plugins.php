<?php get_header(); ?>

<div id="page-hdr">
	<div class="hdr-feed">
		<h2 class="pagetitle">Plugins</h2>		
	</div>
</div>

<div id="content-wrapper" class="wrapper">
<div id="widecolumn">
	
	<div class="multipage clearfloat">

		<?php $alt = ''; ?>
		<?php if (have_posts()) :
		query_posts( $query_string . '&orderby=menu_order&order=ASC&posts_per_page=-1' );
		while (have_posts()) : the_post(); ?>
		
            <?php include (TEMPLATEPATH . '/loop_plugin.php'); ?>

		<?php endwhile; ?>
		
		<?php if ($alt=='alt') { ?>
					</div><!--/final row-->
		<?php } ?>
	
		<?php include (TEMPLATEPATH . '/pagination.php'); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found','themename'); ?></h2>
		
	<?php endif; ?>
	
	</div>

</div><!--/widecolumn-->

<?php get_footer(); ?>