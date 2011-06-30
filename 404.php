<?php get_header(); ?>

<div id="page-hdr">
	<h2 class="pagetitle"><?php _e('Error 404 - Not Found','themename'); ?></h2>
</div>

<div id="content-wrapper" class="wrapper">

<div class="entry">

<p>You 
<?php
	$website = get_bloginfo('url'); #gets your blog's url from wordpress	
	if (!isset($_SERVER['HTTP_REFERER'])) {
	#politely blames the user for all the problems they caused
		echo "tried going to "; #starts assembling an output paragraph
	} elseif (isset($_SERVER['HTTP_REFERER'])) {
	#this will help the user find what they want, and email me of a bad link
	echo "clicked a link to"; #now the message says You clicked a link to...
	}
	echo " <strong>".$website.$_SERVER['REQUEST_URI']."</strong>";
?>
and it doesn't exist.</p>
	
<p>You can click back and try again, or you can trying searching:</p>
<form method="get" action="<?php bloginfo('url'); ?>/">
	<input class="input" type="text" value="<?php the_search_query(); ?>" name="s" />
	<input class="button" type="submit" value="Search" />
</form>

</div>

<?php get_footer(); ?>