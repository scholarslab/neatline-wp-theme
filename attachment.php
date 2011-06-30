<?php get_header(); ?>

<div id="page-hdr">
	<h2 class="pagetitle"><?php the_title(); ?></h2>
</div>

<div id="content-wrapper" class="wrapper">
	<div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); ?>
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; ?>

		<div class="post">
        
        <div class="entry">
		<?php echo $attachment_link; ?>
       
         <h4><?php _e('CAPTION','themename'); ?>: &#8216;<?php the_title(); ?>&#8217;</h4>

        <h4>(<a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">&laquo;<?php _e('Back','themename'); ?></a>)</h4>
        
		</div>
		</div>

	<?php comments_template(); ?>
	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no attachments matched your criteria.','themename'); ?></p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>