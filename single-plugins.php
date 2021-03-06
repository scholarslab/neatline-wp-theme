<?php get_header(); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();

// Set some variables for our post metadata.
$download = get_post_meta( $post->ID , 'plugin_download' , true );
$github = get_post_meta( $post->ID, 'plugin_github_page', true );
?>
<article class="plugin">
    <header>
        <p class="kicker">Plugins</p>
        <h1><?php the_title(); ?></h1>
    </header>
    <div id="plugin-meta" class="secondary">
        <?php if ($download) : ?>
                <p><a href="<?php echo $download; ?>" title="Download <?php the_title_attribute(); ?>" class="button">Download <?php the_title(); ?></a></p>
        <?php endif; ?>
        <?php if ($github) : ?><p>View <?php the_title(); ?> source code, report bugs, or make feature requests on <a href="<?php echo $github; ?>" title="View <?php the_title_attribute(); ?> on GitHub" class="github">GitHub</a>.</p><?php endif; ?>
        <?php
        if ( function_exists('dynamic_sidebar') ) {
            dynamic_sidebar('Single Neatline Plugin');
        }
        ?>
    </div>
    <div id="plugin-content" class="primary">
        <?php the_content(); ?>
    </div>
</article>
<?php endwhile; else: ?>
<div class="deck">Plugins</div>
<h1>Plugin Not Found</h1>
<?php endif; ?>

<?php get_footer(); ?>
