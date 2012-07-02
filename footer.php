</div><!--/content-->
<footer role="contentinfo" class="container">
    <div class="attribution">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
    </div>
    <div id="slab-info">
      <ul>
        <li><a rel="license" class="license" href="http://creativecommons.org/licenses/by/3.0/">CC-BY 3.0</a></li>
        <li><a href="<?php bloginfo('atom_url'); ?>" class="feed">Atom</a> · <a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
        <li><a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#110;&#101;&#97;&#116;&#108;&#105;&#110;&#101;&#64;&#99;&#111;&#108;&#108;&#97;&#98;&#46;&#105;&#116;&#99;&#46;&#118;&#105;&#114;&#103;&#105;&#110;&#105;&#97;&#46;&#101;&#100;&#117;'>&#67;&#111;&#110;&#116;&#97;&#99;&#116;&#32;&#85;&#115;</a></li>
      </ul>
      <a id="slab-logo" href="http://www.scholarslab.org/"><img src="http://static.scholarslab.org/images/logos/slab/slab-logo-black-200px.png" title="Scholars' Lab" alt="Scholars' Lab"/></a>
    </div>
    <?php wp_footer(); ?>
</footer><!--/footer-->
</body>
</html>
