<?php

$nextLink = get_next_posts_page_link();
$previousLink = get_previous_posts_page_link();

if ($nextLink || $previousLink): ?>
<nav class="pager">

<?php if ($nextLink): ?>
  <a href="<?php echo $nextLink; ?>" class="older">Older Posts</a>
<?php endif; ?>

<?php if ($previousLink): ?>
  <a href="<?php echo $previousLink; ?>" class="newer">Newer Posts</a>
<?php endif; ?>

</nav>
<?php endif; ?>
