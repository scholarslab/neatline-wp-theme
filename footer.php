</div><!--/content-->
<footer role="contentinfo" class="container">
    <div class="attribution">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?><?php endif; ?>
    </div>
    <div id="slab-info">
      <ul>
        <li><a rel="license" class="license" href="http://creativecommons.org/licenses/by/3.0/">CC-BY 3.0</a></li>
        <li><a href="<?php bloginfo('atom_url'); ?>" class="feed">Atom</a> · <a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
        <li><a class=email href="mailto:<?php echo antispambot('neatline@collab.itc.virginia.edu', 1); ?>">Contact Us</a></li>
      </ul>
      <a id="slab-logo" href="http://www.scholarslab.org/"><img src="http://static.scholarslab.org/images/logos/slab/slab-logo-black-200px.png" title="Scholars' Lab" alt="Scholars' Lab"/></a>
    </div>
    <?php wp_footer(); ?>
<script type="text/javascript">
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-33089897-1"]),_gaq.push(["_trackPageview"]),function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}()
</script>
</footer><!--/footer-->
</body>
</html>
