</div><!--/content-->
<footer role="contentinfo" class="container">
    <div class="attribution">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
    </div>
    <div id="slab-info">
      <ul>
        <li><a rel="license" class="license" href="http://creativecommons.org/licenses/by/3.0/">CC-BY 3.0</a></li>
        <li><a href="<?php bloginfo('atom_url'); ?>" class="feed">Atom</a> · <a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
        <li><a class=email href="#">Contact Us</a></li>
      </ul>
      <a id="slab-logo" href="http://www.scholarslab.org/"><img src="http://static.scholarslab.org/images/logos/slab/slab-logo-black-200px.png" title="Scholars' Lab" alt="Scholars' Lab"/></a>
    </div>
    <?php wp_footer(); ?>
</footer><!--/footer-->
</body>
</html>
