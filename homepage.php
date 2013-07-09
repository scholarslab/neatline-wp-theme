<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="pitch">
    <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>

<a href="http://hotchkiss.scholarslab.org/neatline-exhibits/show/battle-of-chancellorsville/fullscreen" target="_blank" class="splash-link">
  <div class="splash homepage">
    <div class="launch-overlay">
      <div class="launch-button">Launch Exhibit</div>
    </div>
  </div>
</a>

<ul id="neatline-meta-links">
  <li id="neatline-download"><a href="http://omeka.org/add-ons/plugins/neatline/" title="Download the Neatline plugin.">Download</a></li>
  <li id="neatline-learn-more"><a href="http://docs.neatline.org" title="Learn more about Neatline.">Documentation</a></li>
  <li id="neatline-see-it"><a href="/neatline-in-action/" title="See Neatline in action.">Demos</a></li>
  <li id="neatline-try-it"><a href="http://sandbox.neatline.org" title="Try Neatline">Sandbox</a></li>
</ul>

<?php get_footer(); ?>
