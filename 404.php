<?php get_template_part('templates/header'); ?>

<div class="alert alert-warning">
  <?php _e('Sorry, but the page you were trying to view does not exist.', 'lkk'); ?>
</div>

<p><?php _e('It looks like this was the result of either:', 'lkk'); ?></p>
<ul>
  <li><?php _e('a mistyped address', 'lkk'); ?></li>
  <li><?php _e('an out-of-date link', 'lkk'); ?></li>
</ul>

<?php get_search_form(); ?>
