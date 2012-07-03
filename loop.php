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
<?php if (is_single()): ?>
<footer>
  <div class="author-info">
    <a class="author-picture" href="<?php echo get_the_author_meta('user_url'); ?>"><?php echo get_avatar(get_the_author_meta('ID'),120); ?></a>
    <p class="author-name">By <?php echo(get_the_author_meta('user_firstname') . ' ' . get_the_author_meta('user_lastname')); ?></p>
    <?php if ($description = get_the_author_meta('user_description')): ?>
    <div class="author-description"><?php echo wpautop($description); ?></div>
    <?php endif; ?>
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="all-posts">See all posts by <?php echo get_the_author_meta('user_firstname'); ?></a>
  </div>
</footer>
<?php endif; ?>
</article><!--/end post-->
