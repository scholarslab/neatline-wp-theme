<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ( __('Please do not load this page directly. Thanks!','themename') );
	}
	
	if ( post_password_required() ) {
?>
<?php
		return;
	}

	// Show the comments
	if ( have_comments() ) {
?>

<h3 id="comments">
  <?php comments_number('0', '1', '%' );?>
  <?php _e('Responses','themename'); ?>
  <a href="#respond" title="<?php _e('Leave a comment','themename'); ?>">&raquo;</a> </h3>
<ol class="commentlist" id="singlecomments">
  <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ol>
<?php
		// Begin Trackbacks 
		foreach ($comments as $comment) {
			if ($comment->comment_type == "trackback" || $comment->comment_type == "pingback" || ereg("<pingback />", $comment->comment_content) || ereg("<trackback />", $comment->comment_content)) {
				if (!$runonce) { $runonce = true;
?>
<h3 id="trackbacks">
  <?php _e('Trackbacks','themename'); ?>
</h3>
<ol id="trackbacklist">
  <?php
				}
?>
  <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>"> <cite>
    <?php comment_author_link() ?>
    </cite> </li>
  <?php
			}
		}
		if ($runonce) {
?>
</ol>
<?php
		}
		// End Trackbacks
?>
<div id="pagination">
  <div id="older"><?php previous_comments_link(__('&laquo;Older Comments','themename')); ?></div>
  <div id="newer"><?php next_comments_link(__('Newer Comments&raquo;','themename')); ?></div>
</div>
<?php
		} else {
			// this is displayed if there are no comments so far
			if ('open' == $post->comment_status) {
			} else {
				if(!is_page()) {
?>
<?php /*?><p class="nocomments">
  <?php _e('Comments are closed.','themename'); ?>
</p><?php */?>
<?php
				}
			}
		}
	
		if ('open' == $post-> comment_status) {
?>
<div id="respond">
  <h3>
    <?php _e('Leave a Response','themename'); ?>
  </h3>
  <p id="cancel-comment-reply">
    <?php cancel_comment_reply_link(__('Cancel Reply','themename')); ?>
  </p>
  <?php
		if ( get_option('comment_registration') && !$user_ID ) {
			_e('You must be','themename');
?>
  <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">
  <?php _e('logged in','themename'); ?>
  </a>
  <?php
			_e('to post a comment.','themename');
		} else {
?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php
			if ( $user_ID ) {
?>
    <p>
      <?php _e('Logged in as','themename'); ?>
      <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> &bull; <a href="<?php echo wp_logout_url($redirect); ?>">
      <?php _e('Log out','themename'); ?>
      &raquo;</a> </p>
    <?php
			} else {
?>
    <p>
      <input class="field" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
      <label for="commenter">
      <?php _e('Name','themename'); ?>
      <?php if ($req) { ?>
      <span class="required">
      <?php _e('(required)','themename'); ?>
      </span>
      <?php } ?>
      </label>
    </p>
    <p>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="field" />
      <label for="email">
      <?php _e('Mail (will not be published)','themename'); ?>
      <?php if ($req) { ?>
      <span class="required">
      <?php _e('(required)','themename'); ?>
      </span>
      <?php } ?>
      </label>
    </p>
    <p>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="field" />
      <label for="url">
      <?php _e('Website','themename'); ?>
      </label>
    </p>
    <?php
		 	}
			comment_id_fields();
?>
    <input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
    <p>
    <div id="wysiwyg" class="clearfloat">
      <script type="text/javascript">edWrite( "commentform", "comment" );</script>
    </div>
    <textarea name="comment" class="field" id="comment" cols="10" rows="10" tabindex="4"></textarea>
    </p>
    <?php
			if (get_option("comment_moderation") == "1") {
?>
    <p>
      <?php _e('Please note: comment moderation is enabled and may delay your comment. There is no need to resubmit your comment.','themename'); ?>
    </p>
    <?php
			}
?>
    <p>
      <input name="submit" type="submit" id="submit" class="button" tabindex="5" value="<?php _e('Submit Comment','themename'); ?>" />
    </p>
    <?php
			do_action('comment_form', $post->ID);
?>
  </form>
</div>
<?php } } ?>
