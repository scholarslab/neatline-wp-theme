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

<a href="http://hotchkiss.neatline.org/neatline-exhibits/show/battle-of-chancellorsville/fullscreen" target="_blank" class="splash-link">
  <div class="splash">
    <div class="launch-overlay">
      <div class="launch-button">Launch Exhibit</div>
    </div>
  </div>
</a>

<ul id="neatline-meta-links">
  <li id="neatline-try-it"><a href="http://sandbox.neatline.org" title="Try out Neatline.">Live Sandbox</a></li>
  <li id="neatline-learn-more"><a href="/plugins/neatline" title="Learn more about the Neatline plugin." class="middle">Download</a></li>
  <li id="neatline-see-it"><a href="/neatline-in-action/" title="See Neatline in action.">Demo Exhibits</a></li>
</ul>

<?php get_footer(); ?>
