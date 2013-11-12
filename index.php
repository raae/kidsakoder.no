<?php get_template_part('templates/header', 'single'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'lkk'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php get_template_part('templates/loop'); ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'lkk')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'lkk')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
