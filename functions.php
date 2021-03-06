<?php

/**
 * Featured Images
 */
add_theme_support( 'post-thumbnails' );


/**
 * Custom Post Types
 */
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

/**
 * Menus
 */
add_theme_support('menus');

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'header' => __( 'Header Navigation', 'neatline-theme' ),
	'footer' => __( 'Footer Navigation', 'neatline-theme' ),
	
) );
		

/**
 * Dynamic Titles
 */
function neatline_site_title() {
	
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

/**
 * Register sidebars
 */
if ( function_exists('register_sidebar') ) :
    register_sidebar(array(
		'name' => 'Blog Sidebar',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
		'name' => 'About Page Sidebar',
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
        'after_title' => '</h4>'
    ));
	 register_sidebar(array(
		'name' => 'Single Post',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

	 register_sidebar(array(
		'name' => 'Single Neatline Plugin',
        'before_widget' => '<div class="%2$s widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
endif;

/**
 * Gets images for a given post.
 */
function neatline_get_post_images() {
  global $post;

  $html = '';

  $images = get_children( 'post_type=attachment&post_mime_type=image&post_parent='.$post->ID );

  if ( $images ) {
    foreach ( $images as $attachment_id => $attachment ) {
      $html .= '<figure>';
      $html .= wp_get_attachment_image( $attachment_id, 'full' );
      $html .= '<figcaption>';
      $html .= $attachment->post_excerpt;
      $html .= '</figcaption>';
      $html .= '</figure>';
    }
  }

  return $html;
}

/**
 * Adds links to the_title() if not on a single post or page.
 */
function neatline_link_the_title($title) {
  if (in_the_loop() && !is_singular()) {
    $title = '<a href="'.get_permalink().'" rel="bookmark">'.$title.'</a>';
  }
  return $title;
}

add_filter('the_title', 'neatline_link_the_title');

/**
 * Replaces "[...]" on excerpt_more with an actual ellipsis.
 */
function neatline_excerpt_more( $more ) {
  return '';
}

add_filter( 'excerpt_more', 'neatline_excerpt_more' );

function neatline_get_the_excerpt($excerpt) {

  // Only do this preg_replace if there's an existing excerpt.
  if (has_excerpt() && !is_attachment()) {
    $excerpt = preg_replace(array('/<a([^>]*)>More.<\/a>/', '/&hellip;./'), '', $excerpt);
  }

  $excerpt = rtrim($excerpt, ",.;:_!$&#—-– ");
  $continueLink = ' <a href="'.get_permalink().'">Continue reading.</a>';
  if(substr($excerpt, -1) != ".") {
    $continueLink = '&hellip;.'.$continueLink;
  }
  $excerpt = $excerpt . $continueLink;
  return $excerpt;
}

add_filter('get_the_excerpt', 'neatline_get_the_excerpt');

function neatline_add_post_title_class($classes) {
  global $post;
  if (is_singular() && $classTitle = sanitize_title($post->post_title)) {
    $classes[] = $classTitle;
  }

  return $classes;
}

add_filter('body_class', 'neatline_add_post_title_class');



function menu_element_class($classes, $item){
        if($item->ID == 225 || $item->menu_item_parent == 225) {
            $classes[] = "menu_element";
        }
        return $classes;
    }
    
add_filter('nav_menu_css_class' , 'menu_element_class' , 10 , 2);


function neatline_theme_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <article id="comment-<?php comment_ID(); ?>" class="comment">
                <ul class="comment-meta">
                    <li class="image"><?php echo get_avatar( $comment, '60' ); ?></li>
                    <li class="fn"><?php comment_author_link(); ?></li>
                    <li class="comment-date">
                        <?php
                        printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
                        esc_url( get_comment_link( $comment->comment_ID ) ),
                        get_comment_time( 'c' ),
                        get_comment_date()

                        );
                        ?>
                    </li>
                    <?php edit_comment_link( __( 'Edit this Comment' ), '<li class="edit-link">', '</li>' ); ?>
                    <li class="reply-link">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'labnotes' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </li>
                </ul>
                <div class="comment-content">
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                <?php endif; ?>
                <?php comment_text(); ?>
            </div>
        </article>
<?php
}

