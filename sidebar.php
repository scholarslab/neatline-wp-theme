<div id="secondary">

<?php

if ( function_exists('dynamic_sidebar') ) {
  if (is_page('About')) {
    dynamic_sidebar('About Page Sidebar'); 
  } else {
    dynamic_sidebar('Blog Sidebar');
  }
}
?>


</div><!--/sidebar-->
