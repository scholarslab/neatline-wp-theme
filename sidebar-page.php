<?php
if ($children || $numpages > '1') { ?>

<div id="sidebar">

	<?php
	if ($numpages > '1') { ?>
	
	<?php $temp_query = $wp_query; ?>
	<?php query_posts('page_id='.$post->ID.'&page=2'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="entry">
		<?php the_content(); ?>
		</div>
	<?php endwhile; endif; ?>
	<?php $wp_query = $temp_query; ?>
	
	<?php } ?>
	
	<!--Begin Custom Subnav-->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if ($children) { ?> 
					
					<div class="widget">
						<h3><?php _e('In this section:','themename'); ?></h3>
						
						<ul class="subpages">
						<?php if ($section_overview) {echo $section_overview;} ?>
						<?php echo $children; ?>
						</ul>
					   </div>
					   
						
					<?php } ?>
					
		<?php endwhile; ?>
		<?php endif; ?>
	<!--/custom subnav-->

</div><!--END SIDEBAR-->

<?php }
?>