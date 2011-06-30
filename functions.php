<?php


//  TABLE OF CONTENTS

//  Localization Initialize
//  Featured Images
//  Custom Post Types
//  Add nextpage Button
//  Menus
//  Archive Pagination
//  Search Highlighting
//	Dynamic Titles
//  Dynamic Body Classes
//  Widgets
//  Get the Image
//  Comment output



/* Localization Initialize ********************************************/

load_theme_textdomain('themename');
date_default_timezone_set('America/New_York');


/* Featured Images ********************************************/

add_theme_support( 'post-thumbnails' );


/* Custom Post Types ********************************************/

add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
	register_post_type( 'plugins',
		array(
			'labels' => array(
				'name' => __( 'Neatline Plugins' ),
				'singular_name' => __( 'Neatline Plugin' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			'menu_position' => 20,
			'hierarchical' => true,
			'has_archive' => true,
			'show_in_nav_menus' => true
		)
	);
}

// Menu Fix for CPT
function remove_parent($var) {
	// check for current page values, return false if they exist.
	if ($var == 'current_page_item' || $var == 'current_page_parent' || $var == 'current_page_ancestor'  || $var == 'current-menu-item') { return false; }
	return true;
}
function add_class_to_cpt_menu($classes) {
	// your custom post type name
	if (get_post_type() == 'plugins') {
		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
		$classes = array_filter($classes, "remove_parent");

		// add the current page class to a specific menu item.
		if (in_array('menu-item-108', $classes)) $classes[] = 'current_page_parent';
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_cpt_menu');

// Excerpt Length
function plugins_excerpt_length($length) {
	global $post;
	if ($post->post_type == 'plugins')
		return 32;
	else
		return 40;
}
add_filter('excerpt_length', 'plugins_excerpt_length');



/* Add nextpage Button ********************************************/

add_filter('mce_buttons','wysiwyg_editor');
function wysiwyg_editor($mce_buttons) {
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
}


/* Menus ********************************************/

add_theme_support('menus');

add_action( 'init', 'register_the_menus' );
function register_the_menus() {
	register_nav_menus(array(
			'menu' => __( 'Menu' )
	));
	register_nav_menus(array(
            'menufooter' => __( 'Footer Menu' )
    ));
}

function add_menuclass($ulclass) {
	return preg_replace('/class="menu"/', 'class="menu clearfloat"', $ulclass, 1);
}
add_filter('wp_nav_menu','add_menuclass');

function add_menuid($ulid) {
	return preg_replace('/<ul>/', '<ul id="nav" class="clearfloat">', $ulid, 1);
}
add_filter('wp_page_menu','add_menuid');


/* Archive Pagination ********************************************/

function my_post_limit($limit) {
	global $paged, $myOffset, $postsperpage;
	if(empty($paged)) {
		$paged = 1;
	}
	$pgstrt = ((intval($paged) -1) * $postsperpage) + $myOffset . ', ';
	$limit = 'LIMIT '.$pgstrt.$postsperpage;
	return $limit;
}


/* Search Highlighting ********************************************/

function search_excerpt_highlight() {
	$excerpt = get_the_excerpt();
	$keys = implode('|', explode(' ', get_search_query()));
	$excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);
	
	echo '<p>' . $excerpt . '</p>';
}


function search_title_highlight() {
	$title = get_the_title();
	$keys = implode('|', explode(' ', get_search_query()));
	$title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);
	
	echo $title;
}
		
		

/* Dynamic Titles ********************************************/
function dynamictitles() {
	
	if ( is_single() ) {
      wp_title('');
      echo (' | ');
      bloginfo('name');

} else if ( is_front_page() ) {
      bloginfo('name');
      echo (' | ');
      bloginfo('description');
 
} else if ( is_page() || is_paged() ) {
      bloginfo('name');
      wp_title('|');
 
} else if ( is_author() ) {
      bloginfo('name');
      wp_title(' | '.__('Author','themename').'');

} else if ( is_post_type_archive() ) {
	  bloginfo('name');
	  wp_title('|');
	  
} else if ( is_category() ) {
      bloginfo('name');
      wp_title(' | '.__('Archive for','themename').'');
      ('');

} else if ( is_tag() ) {
      bloginfo('name');
      echo (' | '.__('Tag archive for','themename').'');
      wp_title('');

} else if ( is_archive() ) {
      bloginfo('name');
      echo (' | '.__('Archive for','themename').'');
      wp_title('');

} else if ( is_search() ) {
      bloginfo('name');
      echo (' | '.__('Search Results','themename').'');
 
} else if ( is_404() ) {
      bloginfo('name');
      echo (' | '.__('404 Error (Page Not Found)','themename').'');
 
} else if ( is_home() ) {
      bloginfo('name');
      echo (' | ');
      wp_title('');
 
} else {
      bloginfo('name');
      echo (' | ');
      echo (''.$blog_longd.'');
}
}



/* Dynamic Body Classes ********************************************/

function bodystyle() {

	global $post;
	$class = "class=\"" . bodyclass(false) . "\"";
	if (is_front_page()) {
		return $class . " id=\"home\"";
	} else {
		return $class . " id=\"interior\"";
	}
}


// Generates semantic classes for BODY element, courtesy of Thematic and Sandbox
function bodyclass( $print = true ) {
	global $wp_query, $current_user;
	
	// Generic semantic classes for what type of content is displayed
	is_front_page()  ? $c[] = 'home'       : null; // For the front page, if set
	is_home()        ? $c[] = 'blog'       : null; // For the blog posts page, if set
	is_archive()     ? $c[] = 'archive'    : null;
	is_date()        ? $c[] = 'by-date'       : null;
	is_search()      ? $c[] = 'search'     : null;
	is_paged()       ? $c[] = 'paged'      : null;
	is_attachment()  ? $c[] = 'attachment' : null;
	is_404()         ? $c[] = 'four04'     : null; // CSS does not allow a digit as first character

	// Special classes for BODY element when a single post
	if ( is_single() ) {
		$postID = $wp_query->post->ID;
		the_post();

		// Adds 'single' class and class with the post ID
		$c[] = 'single postid-' . $postID;

		// Adds classes for the month, day, and hour when the post was published
		if ( isset( $wp_query->post->post_date ) )
			thematic_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $c, '' );

		// Adds category classes for each category on single posts
		if ( $cats = get_the_category() )
			foreach ( $cats as $cat )
				$c[] = 'category-' . $cat->slug;

		// Adds tag classes for each tags on single posts
		if ( $tags = get_the_tags() )
			foreach ( $tags as $tag )
				$c[] = 'tag-' . $tag->slug;

		// Adds MIME-specific classes for attachments
		if ( is_attachment() ) {
			$mime_type = get_post_mime_type();
			$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
				$c[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
		}

		// Adds author class for the post author
		$c[] = 'author-' . sanitize_title_with_dashes(strtolower(get_the_author_login()));
		rewind_posts();
	}

	// Author name classes for BODY on author archives
	elseif ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}

	// Category name classes for BODY on category archvies
	elseif ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->slug;
	}

	// Tag name classes for BODY on tag archives
	elseif ( is_tag() ) {
		$tags = $wp_query->get_queried_object();
		$c[] = 'tag';
		$c[] = 'tag-' . $tags->slug;
	}

	// Page author for BODY on 'pages'
	elseif ( is_page() ) {
		$pageID = $wp_query->post->ID;
		$page_children = wp_list_pages("child_of=$pageID&echo=0");
		the_post();
		$c[] = 'page pageid-' . $pageID;
		$c[] = 'page-author-' . sanitize_title_with_dashes(strtolower(get_the_author('login')));
		// Checks to see if the page has children and/or is a child page; props to Adam
		if ( $page_children )
			$c[] = 'page-parent';
		if ( $wp_query->post->post_parent )
			$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
		if ( is_page_template() ) // Hat tip to Ian, themeshaper.com
			$c[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) );
		rewind_posts();
	}

	// Search classes for results or no results
	elseif ( is_search() ) {
		the_post();
		if ( have_posts() ) {
			$c[] = 'search-results';
		} else {
			$c[] = 'search-no-results';
		}
		rewind_posts();
	}

	// Paged classes; for 'page X' classes of index, single, etc.
	if ( ( ( $page = $wp_query->get('paged') ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) {
		$c[] = 'paged-' . $page;
		if ( is_single() ) {
			$c[] = 'single-paged-' . $page;
		} elseif ( is_page() ) {
			$c[] = 'page-paged-' . $page;
		} elseif ( is_category() ) {
			$c[] = 'category-paged-' . $page;
		} elseif ( is_tag() ) {
			$c[] = 'tag-paged-' . $page;
		} elseif ( is_date() ) {
			$c[] = 'date-paged-' . $page;
		} elseif ( is_author() ) {
			$c[] = 'author-paged-' . $page;
		} elseif ( is_search() ) {
			$c[] = 'search-paged-' . $page;
		}
	}

	// Separates classes with a single space, collates classes for BODY
	$c = join( ' ', apply_filters( 'body_class',  $c ) ); // Available filter: body_class

	// And tada!
	if($print) {
		print($c);
	} else {
		return $c;
	}
}

// Generates time- and date-based classes for BODY, post DIVs, and comment LIs; relative to GMT (UTC)
function thematic_date_classes( $t, &$c, $p = '' ) {
	
}






/* Widgets ********************************************/

if ( function_exists('register_sidebar') ) :
    register_sidebar(array(
		'name' => 'Blog Sidebar',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
		'name' => 'Homepage Sidebar',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
		'name' => 'Page Sidebar',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
		'name' => 'Footer',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
endif;






/* Get Post Image ********************************************/

/* 
To retrieve a post image and resize it with TimThumb: 
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=105&amp;h=85&amp;src='); ?></a> 
*/
	

function get_post_image ($post_id=0, $width=0, $height=0, $img_script='') {
	global $wpdb;
	if($post_id > 0) {

		 // select the post content from the db

		 $sql = 'SELECT post_content FROM ' . $wpdb->posts . ' WHERE id = ' . $wpdb->escape($post_id);
		 $row = $wpdb->get_row($sql);
		 $the_content = $row->post_content;
		 if(strlen($the_content)) {

			  // use regex to find the src of the image

			preg_match("/<img src\=('|\")(.*)('|\") .*( |)\/>/", $the_content, $matches);
			if(!$matches) {
				preg_match("/<img class\=\".*\" title\=\".*\" src\=('|\")(.*)('|\") .*( |)\/>/U", $the_content, $matches);
			}
			$the_image = '';
			$the_image_src = $matches[2];
			$frags = preg_split("/(\"|')/", $the_image_src);
			if(count($frags)) {
				$the_image_src = $frags[0];
			}

			  // if src found, then create a new img tag

			  if(strlen($the_image_src)) {
				   if(strlen($img_script)) {

					    // if the src starts with http/https, then strip out server name

					    if(preg_match("/^(http(|s):\/\/)/", $the_image_src)) {
						     $the_image_src = preg_replace("/^(http(|s):\/\/)/", '', $the_image_src);
						     $frags = split("\/", $the_image_src);
						     array_shift($frags);
						     $the_image_src = '/' . join("/", $frags);
					    }
					    $the_image = '<img alt="" src="' . $img_script . $the_image_src . '" />';
				   }
				   else {
					    $the_image = '<img alt="" src="' . $the_image_src . '" width="' . $width . '" height="' . $height . '" />';
				   }
			  }
			  return $the_image;
		 }
	}
}



/* Comments Callback ********************************************/
function mytheme_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard clearfloat">
				<?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
				<div class="commentmetadata">
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
					<div class="comment-date">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
							<?php printf(__('%1$s &bull; %2$s'), get_comment_date(),  get_comment_time()) ?>
						</a>
						<?php edit_comment_link(__('(Edit)','themename')) ?>
					</div>
				</div>
			</div>
<?php
	if ($comment->comment_approved == '0') {
?>
			<em><?php _e('Your comment is awaiting moderation.','themename') ?></em>
			<br />
<?php }	comment_text(); ?>
			<div class="reply">
<?php
	comment_reply_link(
		array_merge( $args, array(
			'depth' => $depth, 
			'reply_text' => __('Reply','themename'), 
			'login_text' => __('Log in to reply','themename'),				
			'max_depth' => $args['max_depth'])
		)
	);
?>
			</div>
		</div>
<?php
}
		
		
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;	
}
add_filter('comment_class','comment_add_microid');
		
	?>