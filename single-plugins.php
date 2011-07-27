<?php get_header(); ?>

	
		
	<div id="page-hdr">
		<h2 class="pagetitle"><?php echo get_the_title('6'); ?></h2>
	</div>
	
	<div id="content-wrapper" class="wrapper">
	
		<div id="<?php if ($children || $numpages > '1') { ?>content<?php } else { ?>widecolumn<?php } ?>">
	
			<?php $alt = ''; ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php include (TEMPLATEPATH . '/loop_plugin.php'); ?>
			
			<?php endwhile; ?>
			<?php if ($alt=='alt') { ?>
					</div><!--/final row-->
			<?php } ?>
			<?php endif; ?>
		</div>
	
	

<?php get_footer(); ?>