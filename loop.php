<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<?php if (!is_page()) : ?>
<p class="kicker">
  <time pubdate datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
</p>
<?php endif; ?>
<h1><?php the_title(); ?></h1>
</header>
<div class="entry">
<?php if (!is_singular()) { ?>

	<?php the_excerpt(); ?>

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
