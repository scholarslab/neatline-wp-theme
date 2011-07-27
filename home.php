<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="entry">
			<?php the_content(); ?>
			&nbsp;<a class="more" href="/plugins/" title="Learn More" rel="bookmark">Learn More</a>
		</div>
<?php endwhile; endif; ?>

</div><!--/masthead-content-->

</div><!--/masthead-->
</div>
<div id="main">

<div id="content-wrapper" class="wrapper">	

	<h3 id="feature-tab">Explore Neatline</h3>

	<div id="feature-panel">
	<span id="top"></span>
	<div id="feature-panel-content" class="clearfloat">
	
		<div id="content">
		
			<div id="feature">
<?php $parent_page_id = 8; //Neatline in Action ?>
<?php $multi_query = new WP_Query('static=true&post_status=publish&posts_per_page=-1&post_parent='.$parent_page_id.'&orderby=menu_order&order=ASC'); ?>
		
<?php if($multi_query->have_posts()) : while ($multi_query->have_posts()) : $multi_query->the_post(); ?>
							<div class="entry entry-full">
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
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
			</div>
	
		</div>

		<div id="sidebar">
		
			<div id="headlines" class="widget">
				<h3>Recent News</h3>
				
				<ul class="news">
		<?php
			global $post;
			$tmp_post = $post;
			$news_posts = get_posts('numberposts=3');
			foreach($news_posts as $post) :
			setup_postdata($post);
		?>
					<li>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php the_excerpt(); ?>
					</li>
		<?php endforeach; ?>
		<?php $post = $tmp_post; ?> 
		
				</ul>
			</div>
			
			
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php if ($numpages > '1') : ?>
			
			<?php $temp_query = $wp_query; ?>
			<?php query_posts('page_id='.$post->ID.'&page=2'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="entry">
				<?php the_content(); ?>
				</div>
			<?php endwhile; endif; ?>
			<?php $wp_query = $temp_query; ?>
			
			<?php endif; ?>
			
		<?php endwhile; endif; ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Sidebar') ) : ?><?php endif; ?>
		
		</div><!--END SIDEBAR-->
	
	</div>
	</div>

</div><!--/content-wrapper-->

<?php get_footer(); ?>