<?php if(is_front_page()) : ?>
	
	<?php include_once (TEMPLATEPATH . "/page_home.php"); ?>

<?php else : ?>

<?php get_header(); ?>

	<?php include_once (TEMPLATEPATH . "/childnav.php"); ?>
		
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
		</div>
	
	<?php include_once (TEMPLATEPATH . "/sidebar-page.php"); ?>

<?php get_footer(); ?>
<?php endif; ?>