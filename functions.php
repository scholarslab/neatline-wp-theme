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

function neatline_blog_archive_title() {
    // Set up our blog archives title.
    $pageTitle = 'Blog Archives';
    
    if (is_category()) {
        $pageTitle = $pageTitle . ': &#8220;'.single_cat_title().'&#8221; Category';
    } elseif (is_tag()) {
        $pageTitle = $pageTitle .': &#8220;'.single_tag_title().'&#8221; Tag';
    } elseif(is_day()) {
        $pageTitle = $pageTitle .': '.the_time('F jS, Y');
    } elseif (is_month()) {
        $pageTitle = $pageTitle .': '.the_time('F, Y');
    } elseif (is_year()) {
        $pageTitle = $pageTitle .': '.the_time('Y');
    }
    
    echo $pageTitle;
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
