<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
<h1 class="posttitle">

<?php if (is_search()): ?>

<a href="<?php the_permalink() ?>" rel="bookmark"><?php search_title_highlight(); ?></a>

<?php else: ?> 

<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>

<?php endif; ?>
</h1>

<div class="entry">
<?php if (is_archive() || is_home()) { ?>

	<?php the_excerpt(); ?>

<?php } elseif (is_search()) { ?>

   <?php search_excerpt_highlight(); ?>
    
<?php } else { ?>
	<?php the_content(__('Read the rest of this entry &raquo;','themename')); ?>
    
	<?php wp_link_pages(array(
				'before' => '<p><strong> '.__('Pages:','themename').' </strong>', 
				'after' => '</p>', 
				'next_or_number' => 'number')); 
				?>
    
	<?php if (is_single()) : ?>
   
		<?php the_tags('<span id="tags"><strong>'.__('Tagged as:','themename').'</strong> ', ', ', '</span>'); ?>
	
	<?php endif; ?>
    
	

<?php } ?>

</div><!--/end entry-->
</article><!--/end post-->