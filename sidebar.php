<div id="secondary">

<?php

if ( function_exists('dynamic_sidebar') ) {
  if (is_page('About')) {
    dynamic_sidebar('About Page Sidebar'); 
  } else if (is_single()) }
    dynamic_sidebar('Single Post');
  } else {
    dynamic_sidebar('Blog Sidebar');
  }
}
?>


</div><!--/sidebar-->
