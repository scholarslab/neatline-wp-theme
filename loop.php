<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
 <h2 class="posttitle">
<?php if (is_single()) { ?>
	<?php the_title(); ?>
  
  <?php } elseif (is_search()) { ?>
 
    <a href="<?php the_permalink() ?>" rel="bookmark"><?php search_title_highlight(); ?></a>
	
     <?php } else { ?> 
    
    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
    
	<?php } ?>
</h2>

<?php if (is_search() && in_category(1)) : ?>

<?php else : ?>
	<p class="postmetadata"><em><?php _e('by','themename'); ?></em> <?php the_author(); ?> <em><?php _e('on','themename'); ?></em> <?php the_time('M d, Y'); ?>
    <?php if ('open' == $post->comment_status) :
		if (!is_single()) : ?>
		<span class="commentcount">(<?php comments_popup_link('0', '1', '%'); ?>) <?php _e('Comments','themename'); ?></span>
	<?php endif; endif; ?>
	</p>
<?php endif; ?>

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
</div><!--/end post-->