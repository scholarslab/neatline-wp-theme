</div><!--/content-->
<footer class="container" role="contentinfo">
    <div class="attribution">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
    </div>
    <div class="site-credits">
        <a id="logo_scholars-lab" href="http://www.scholarslab.org/"><img alt="Scholars' Lab" src="<?php bloginfo('template_url'); ?>/images/logo_scholarslab.png" border="0"  /></a>
        <?php wp_nav_menu('theme_location=menufooter&menu_id=footernav&sort_column=menu_order&container_class=footermenu&fallback_cb='); ?>
    </div>
    <?php wp_footer(); ?>
</footer><!--/footer-->
</body>
</html>