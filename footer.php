</div><!--/content-->
<footer role="contentinfo" class="container">
    <div class="attribution">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
    </div>
    <div id="slab-info">
        <a id="slab-logo" href="http://www.scholarslab.org/"><img alt="Scholars' Lab" src="<?php bloginfo('template_url'); ?>/images/logo_scholarslab.png" border="0"  /></a>
    </div>
    <?php wp_footer(); ?>
</footer><!--/footer-->
</body>
</html>
